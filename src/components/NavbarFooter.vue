<template>
  <footer>
    <b-container fluid class="my-3 text-center text-muted">
      <span class="d-inline-block text-nowrap mx-3">
        <span>Designed by </span>
        <b-link href="https://tigerfeng.cn" class="text-secondary">Tiger Feng</b-link>
      </span>
      <span class="d-inline-block text-nowrap mx-3">
        <span>Developed by </span>
        <b-link href="https://github.com/orgs/YKPS-FooBar/" class="text-secondary">The Foo Bar</b-link>
      </span>
    </b-container>
  </footer>
</template>

<script>
export default {
  name: 'NavbarFooter'
}
</script>

<style lang="scss" scoped>
a {
  transition: color 200ms ease;
}
</style>
