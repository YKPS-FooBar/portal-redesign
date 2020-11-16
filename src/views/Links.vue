<template>
  <main>
    <b-container>
      <h1>Links</h1>

      <b-card-group deck style="max-width: 60em;">
        <Card v-for="link in links" :key="link.name" :link="link.url" :icon="link.icon" :name="link.name" named />
      </b-card-group>
    </b-container>
  </main>
</template>

<script>
import Card from '@/components/Card.vue'
import links from '@/data/links.json'

export default {
  name: 'Links',
  components: {
    Card
  },
  computed: {
    links: () => links
  }
}
</script>
