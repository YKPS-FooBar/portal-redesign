<template>
  <b-navbar toggleable="md" class="px-4 px-sm-5 py-3 mb-5">
    <b-navbar-brand to="/" class="d-flex align-items-center">
      <img src="../../public/images/icons/ykpao.svg" alt="" style="height: 2em;" class="d-inline-block align-top mr-3">
      <span style="color: #5cb531;" class="font-weight-bold">
        <span class="d-none d-sm-inline">YK Pao School Portal</span>
        <span class="d-inline d-sm-none">YKPS Portal</span>
      </span>
    </b-navbar-brand>

    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" is-nav>
      <b-navbar-nav class="ml-auto">
        <b-nav-item
          v-for="link in links"
          :key="link.name"
          :to="link.link"
          class="font-weight-bold mx-2"
          exact-active-class="active"
        >{{ link.name }}</b-nav-item>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</template>

<script>
export default {
  name: 'NavbarHeader',
  data: () => ({
    links: [
      {
        name: 'Dashboard',
        link: '/'
      },
      {
        name: 'Clubs',
        link: '/clubs'
      },
      {
        name: 'Links',
        link: '/links'
      }
    ]
  })
}
</script>

<style lang="scss" scoped>
$active-link-underline: #f1bb33;

.nav-link {
  transition: border-bottom-color 200ms ease, color 200ms ease;
  border-bottom-color: rgba($active-link-underline, 0);

  &.active {
    color: rgba(0, 0, 0, 0.9) !important;
    border-bottom: 2px solid $active-link-underline;
    margin-bottom: -2px;
  }
}
</style>
