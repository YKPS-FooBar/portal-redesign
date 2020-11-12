<template>
  <div id="app">
    <Navbar />
    <router-view />
    <FooterInfo />
  </div>
</template>

<script>
import Navbar from "./components/Navbar.vue";
import FooterInfo from "./components/FooterInfo.vue";
export default {
  name: 'App',
  components: {
    Navbar,
    FooterInfo
  }
};
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
