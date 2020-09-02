<template>
  <div class="dashboard">
    <div class="heading-wrapper">
      <h1>Dashboard</h1>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Dashboard',
  components: {
  }
}
</script>

<style scoped>
.heading-wrapper {
  margin-top: 5em;
}
.content-wrapper {
  width: calc(100% - 30em);
  margin: 2em 15em !important;
}
.link-card {
  width: calc(25% - 2em);
}
.link-card:hover {
}

@media screen and (min-width: 1280px) {
  .link-card:not(:nth-child(4n)) {
    margin-right: 2em;
  }
}

@media screen and (max-width: 1280px) {
  .content-wrapper {
    width: calc(100% - 20em);
    margin: 2em 10em !important;
  }
  .link-card {
    width: calc(50% - 2em);
    margin-bottom: 2em;
  }
  .link-card:not(:nth-child(2n)) {
    margin-right: 2em;
  }
}
@media screen and (max-width: 800px) {
  .content-wrapper {
    width: calc(100% - 1em);
    margin: 2em 0.5em !important;
  }
}
</style>

