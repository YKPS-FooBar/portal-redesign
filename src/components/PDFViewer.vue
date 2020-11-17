<template>
  <div v-if="numPages === null">Loading...</div>
  <div v-else>
    <pdf v-for="index in numPages" :key="index" :src="loadingTask" :page="index"></pdf>
  </div>
</template>

<script>
import pdf from 'vue-pdf'

export default {
  name: 'PDFViewer',
  props: {
    src: String
  },
  data: () => ({
    loadingTask: null,
    numPages: null
  }),
  components: {
    pdf
  },
  created() {
    this.loadingTask = pdf.createLoadingTask(this.src)
  },
  mounted() {
    this.loadingTask.promise.then(pdf => this.numPages = pdf.numPages)
  }
}
</script>
