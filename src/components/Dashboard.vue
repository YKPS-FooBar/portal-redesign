<template>
  <div class="d-flex page-heading-wrapper justify-items-center align-items-center center">
    <h1 class="page-heading">Dashboard</h1>
    <vs-button
        :active="active === 0"
        @click="active = 0"
    >
      Active
    </vs-button>
  </div>
</template>

<script>
export default {
  name: 'Dashboard',
  data:() => ({
    active: 0
  }),
  props: {
    msg: String
  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.page-heading-wrapper {
  width: 60% !important;
}
.page-heading {
  width: 100% !important;
  font-family: "Helvetica Now Display", Helvetica, sans-serif;
  font-weight: 400 !important;
  text-align: left !important;
}
</style>
