<template>
  <div id="app">
    <Navbar />
    <router-view />
  </div>
</template>

<script>
  import Navbar from "./components/Navbar.vue"
  export default {
    name: 'App',
    components: {
      Navbar
    }
  }
</script>

<style lang="scss">
#app {
  font-family: "Helvetica Now Display", Helvetica, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
