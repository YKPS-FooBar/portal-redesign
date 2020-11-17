<template>
  <main>
    <b-container>
      <h1>Dashboard</h1>

      <section>
        <h2>Latest Info</h2>
        <b-card-group deck style="max-width: 60em;">
          <Card v-for="file in files" :key="file.id" :modal="`modal-${file.id}`" :icon="file.icon" :name="file.name" />

          <!-- static so that it is only rendered once on DOM load -->
          <b-modal v-for="file in files" :key="`modal-${file.id}`" :id="`modal-${file.id}`" size="xl" static centered hide-footer scrollable :title="file.name">
            <pdf v-for="index in file.numPages" :key="index" :src="file.src" :page="index"></pdf>
            <b-card v-if="file.attachments" no-body header="Attachments">
              <b-list-group flush>
                <b-list-group-item v-for="filename in file.attachments" :key="filename">
                  <b-link :href="`/uploads/${file.attachmentName.replace(/\[\]$/, '')}/${encodeURIComponent(filename)}`" target="_blank">
                    {{ filename }}
                  </b-link>
                </b-list-group-item>
              </b-list-group>
            </b-card>
          </b-modal>
        </b-card-group>
      </section>

      <section>
        <h2>Common Links</h2>
        <b-card-group deck style="max-width: 60em;">
          <Card v-for="link in homeLinks" :key="link.name" :link="link.url" :icon="link.icon" :name="link.name" named />
        </b-card-group>
      </section>
    </b-container>
  </main>
</template>

<script>
import Card from '@/components/Card.vue'
import links from '@/data/links.json'
import axios from 'axios'
import pdf from 'vue-pdf'

export default {
  name: 'Dashboard',
  data: () => ({
    // files to show in "Latest Info"
    files: [
      {
        id: 0,
        name: 'Daily Bulletin',
        icon: 'dailybulletin.svg',
        src: pdf.createLoadingTask('/uploads/daily-bulletin.pdf'),
        numPages: null,
        attachmentName: 'attachments[]',
        attachments: []
      },
      {
        id: 1,
        name: 'News & Updates',
        icon: 'newsupddates.svg',
        src: pdf.createLoadingTask('/uploads/news-updates.pdf'),
        numPages: null
      }
    ]
  }),
  mounted() {
    this.files.forEach(file => {
      file.src.promise.then(pdf => file.numPages = pdf.numPages)

      if ('attachmentName' in file) {
        const data = new FormData()
        data.append('name', file.attachmentName)
        axios.post('/files.php', data, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }).then(response => file.attachments = Object.keys(response.data).sort())
      }
    })
  },
  components: {
    Card,
    pdf
  },
  computed: {
    homeLinks: () => links.filter(link => link.home)
  }
}
</script>
