<template>
  <div id="app">
    <NavbarHeader />
    <router-view />
    <NavbarFooter />
  </div>
</template>

<script>
import NavbarHeader from './components/NavbarHeader.vue'
import NavbarFooter from './components/NavbarFooter.vue'

export default {
  name: 'App',
  components: {
    NavbarHeader,
    NavbarFooter
  }
}
</script>
