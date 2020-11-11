<template>
  <div class="nav">
    <router-link to="/">
      <img src="../../public/images/icons/ykpao.svg" class="logo">
    </router-link>
    <router-link to="/" class="nav-title">
      YK Pao School Portal
    </router-link>
    <router-link class="nav-item" v-for="link in links" :key="link.name" :to="link.link">
      {{ link.name }}
    </router-link>
  </div>
</template>
<script>
export default {
  data() {
    return {
      links: [
        {
          id: 0,
          name: 'Dashboard',
          link: '/'
        },
        {
          id: 1,
          name: 'Clubs',
          link: '/clubs'
        },
        {
          id: 2,
          name: 'Links',
          link: '/links'
        }
      ]
    };
  }
}
</script>

<style lang="scss" scoped>

.nav {
  margin: 1.5em 2em;

  @media screen and (max-width: 640px) {
    margin: 1.5em .5em;
  }

  display: flex;
  align-items: center;
  text-align: left;
}

.logo {
  max-width: 5em;
  height: 2em;
  margin: 2pt 0 0 1em;
}

.nav-item {
  margin: 0 1em;
  font-size: 12pt;
  text-decoration: none;
  color: #2c3e50;
  font-weight: bold;
  transition: border-bottom-color .5s ease, color .5s ease;
  border-bottom-color: transparent;

  &:not(.nav-title).router-link-exact-active {
    color: black;
    border-bottom: 2px solid #f1bb33;
    margin-bottom: -2px;
  }
}

.nav-title {
  @extend .nav-item;
  flex: auto;
  font-size: 16pt;
  color: #5cb531;

  @media screen and (max-width: 690px) {
    display: none;
  }
}
</style>
