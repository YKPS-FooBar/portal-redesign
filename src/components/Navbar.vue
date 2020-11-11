<template>
  <div class="center">
    <vs-navbar target-scroll="#padding-scroll-content" padding-scroll center-collapsed v-model="active">
      <template #left>
        <vs-navbar-title class="nav-logo">
          <img src="../../public/images/icons/ykpao.svg" class="logo">
        </vs-navbar-title>
        <vs-navbar-item class="nav-title" style="color: #5cb531 !important; font-size: 14pt;">
          YK Pao School Portal
        </vs-navbar-item>
      </template>
      <template #right>
        <router-link class="nav-item" v-for="link in links" :key="link.id" :to="link.link">
          <vs-navbar-item :active="active == link.id" @click="active = link.id">
            {{ link.title }}
          </vs-navbar-item>
        </router-link>
<!--        <p style="margin-right: 1em; color: #aaa;">Dark Mode</p>-->
<!--        <vs-switch v-model="active2">-->
<!--          <template #circle>-->
<!--            <i v-if="!active2" class='bx bxs-moon' ></i>-->
<!--            <i v-else class='bx bxs-sun' ></i>-->
<!--          </template>-->
<!--        </vs-switch>-->
      </template>
    </vs-navbar>
  </div>
</template>
<script>
export default {
  data() {
    return {
      active: 0,
      links: [
        {
          id: 0,
          title: 'Dashboard',
          link: '/'
        },
        {
          id: 1,
          title: 'Clubs',
          link: '/clubs'
        },
        {
          id: 2,
          title: 'Links',
          link: '/links'
        }
      ]
    };
  }
}
</script>

<style scoped>
.logo {
  margin-left: 2em;
  max-width: 5em;
  height: 2em;
  margin-top: 2pt !important;
}

.nav-item {
  font-size: 12pt !important;
  font-weight: 400 !important;
  text-decoration: none !important;
  color: black;
}

.vs-button-primary {
  margin-left: .5em !important;
}

.vs-button-primary-label {
  font-size: 12pt !important;
  text-decoration: none !important;
  color: #fff;
}

@media screen and (max-width: 1080px) {
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
  .logo {
    margin-left: 0.5em;
  }
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

@media screen and (max-width: 640px) {
  .nav-title {
    display: none;
  }
}
</style>
