<template>
  <div class="d-flex dashboard">
    <div class="heading-wrapper">
      <h1>Dashboard</h1>
    </div>
    <div class="content-wrapper justify-content-center">
      <vs-card class="link-card" primary>
        <template #img>
          <div class="d-flex link-icon-wrapper justify-items-center justify-content-center">
            <a :href="`${item.url}`" style="color: #000; text-decoration: none !important;">
              <div style="width: 100%;">
                <img v-if="item.icon" :src="require(`../../public/images/icons/powerschool.svg`)" class="link-icon" style="width: 100% !important;"/>
              </div>
              <h3 style="word-wrap: break-spaces; width: 100%">PowerSchool</h3>
            </a>
          </div>
        </template>
      </vs-card>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Dashboard',
  components: {
  },
  data() {
    return {
      tab: null,
    }
  },
  computed: {
  }
}
</script>

<style scoped>
h1 {
  margin-top: 5em !important;
}
vs-card {
  text-decoration: none !important;
}
vs-card:hover {
  box-shadow: rgba(0,0,0,0.25) 0 5px 30px 0 !important;
}
.heading-wrapper {
  text-align: left !important;
  margin-top: 5em;
  margin-left: 15em;
}
.content-wrapper {
  width: calc(100% - 30em);
  margin: 2em 15em !important;
}
.link-card {
  width: calc(25% - 2em);
  height: 15em !important;
  transition: 200ms ease-in;
  margin-bottom: 5em;
}
.link-icon-wrapper {
  height: 15em;
}
.link-icon {
  justify-self: center !important;
  justify-items: center !important;
  justify-content: center !important;
  margin: 3em 1em;
  height: 5em;
  max-width: 8em;
}
#link-label {
  text-decoration: none !important;
}
@media screen and (min-width: 1280px) {
  .link-card:not(:nth-last-child(4n)) {
    margin-right: 2em;
    margin-left: 0;
  }
}

@media screen and (max-width: 1280px) {
  .heading-wrapper {
    text-align: left !important;
    margin-top: 5em;
    margin-left: 6em;
  }
  .content-wrapper {
    width: calc(100% - 10em);
    margin: 2em 5em !important;
  }
  .link-card {
    width: calc(50% - 2em);
    margin-bottom: 2em;
  }
  .link-card:not(:nth-child(2n)) {
    margin-right: 2em;
  }
  .link-icon {
    justify-self: center !important;
    padding: 5em 0;
    max-height: 12.5em;
    max-width: 10em;
  }
}
@media screen and (min-width: 1280px) {
  .link-card:not(:nth-last-child(4n)) {
    margin-right: 2em;
    margin-left: 0;
  }
}
@media screen and (max-width: 800px) {
  .heading-wrapper {
    margin-top: 3em;
    margin-left: 1.5em;
  }
  .content-wrapper {
    width: calc(100% - 1em);
    margin: 2em 1.5em !important;
  }
}
</style>

