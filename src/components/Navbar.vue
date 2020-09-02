<template>
  <div>
    <vs-navbar v-model="activeItem" class="navbar-wrapper">
      <a href="/" slot="title" class="nav-item-wrapper" style="display: flex !important; justify-items: center !important; align-items: center !important;">
        <vs-navbar-title class="nav-logo">
          <img src="../../public/images/icons/ykpao.svg" style="width: 25%;">
        </vs-navbar-title>
        <vs-navbar-item style="margin-top: -1pt !important; color: #5cb531 !important;">
          YK Pao School Portal
        </vs-navbar-item>
      </a>
      <vs-navbar-item class="static" v-bind:class="{ active: activeItem }">
        <router-link to="/clubs" class="nav-item">Clubs</router-link>
      </vs-navbar-item>
      <vs-navbar-item class="static" v-bind:class="{ active: activeItem }">
        <router-link to="/links" class="nav-item">Links</router-link>
      </vs-navbar-item>
      <vs-button class="vs-button-primary">
        <router-link to="/" class="vs-button-primary-label">Dashboard</router-link>
      </vs-button>
    </vs-navbar>
  </div>
</template>
<script>
export default {
  data: () => ({
    activeItem: 0,
  })
}
</script>
<style scoped>
.active {
  color: #5cb531;
}

.navbar-wrapper {
  padding: 0 15em;
  color: #5cb531;
}

.nav-item-wrapper {
  padding: .75em .25em !important;
  color: #5cb531;
  margin-left: -2.5em !important;
}

.nav-item {
  font-size: 12pt !important;
  font-weight: 400 !important;
}

.vs-button-primary {
  margin-left: .5em !important;
}

.vs-button-primary-label {
  font-size: 12pt !important;
  color: #fff;
}

@media screen and (max-width: 1280px) {
  .navbar-wrapper {
    padding: 1.5em 5em;
    display: flex;
  }

  .nav-item-wrapper {
    padding: 1em 0 !important;
    justify-self: center !important;
    margin-left: -2.5em !important;
  }

  .vs-button-primary {
    margin-top: 1.5em !important;
    margin-bottom: 1.5em !important;
    margin-left: .5em !important;
  }
}

@media screen and (max-width: 800px) {
  .navbar-wrapper {
    padding: 1.5em 0.5em;
    display: flex;
  }

  .nav-item-wrapper {
    padding: 1em 0 !important;
    margin-top: 3pt !important;
    margin-left: 0 !important;
  }

  .vs-button-primary {
    margin-top: 1.5em !important;
    margin-bottom: 2em !important;
    margin-left: .5em !important;
  }
}
</style>
