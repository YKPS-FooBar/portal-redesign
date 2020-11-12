<template>
  <div class="d-flex dashboard">
    <div class="heading-wrapper">
      <h1>Dashboard</h1>
    </div>
    <div class="content-wrapper justify-content-center">
      <div class="subheading-wrapper">
        <h2>Latest Info</h2>
      </div>
      <vs-row vs-justify="center" vs-align="center" class="d-flex card-wrapper">

        <vs-card v-for="file in files" :key="file.id" @click="file.active = true" class="link-card bulletin-card" primary>
          <template #img>
            <div class="d-flex link-icon-wrapper justify-items-center justify-content-center">
              <a style="color: #000; text-decoration: none !important;">
                <div style="width: 100%;">
                  <p style="line-height: 1.75;"><br></p>
                  <img :src="file.icon" class="link-icon link-icon-large" style="width: 100% !important;"/>
                </div>
              </a>
            </div>
          </template>
        </vs-card>

        <vs-dialog v-for="file in files" :key="`dialog-${file.id}`" overflow-hidden full-screen blur not-padding v-model="file.active">
          <div class="con-content">
            <iframe class="embed-responsive-item" :src="file.location" scrolling="auto"></iframe>
          </div>
        </vs-dialog>

      </vs-row>
      <div class="subheading-wrapper">
        <h2>Common Links</h2>
      </div>
      <vs-row vs-justify="center" vs-align="center" class="d-flex card-wrapper">

        <vs-card v-for="link in homeLinks" :key="link.name" class="link-card" primary>
          <template #img>
            <div class="d-flex link-icon-wrapper justify-items-center justify-content-center">
              <a :href="link.url" style="color: #000; text-decoration: none !important;">
                <div style="width: 100%;">
                  <img v-if="link.icon" :src="require(`../../public/images/icons/${link.icon}`)" class="link-icon" style="width: 100% !important;">
                </div>
                <h3 style="word-wrap: break-spaces; width: 100%">{{ link.name }}</h3>
              </a>
            </div>
          </template>
        </vs-card>

      </vs-row>
    </div>
  </div>
</template>

<script>
import links from "@/data/links.json";
export default {
  name: 'Dashboard',
  props: ['name', 'icon'],
  data() {
    return {
      // files to show in "Latest Info"
      files: [
        {
          id: 0,
          icon: require('../../public/images/icons/dailybulletin.svg'),
          location: '/images/icons/daily-bulletin.pdf',
          active: false
        },
        {
          id: 1,
          icon: require('../../public/images/icons/newsupddates.svg'),
          location: '/files/news-updates.pdf',
          active: false
        }
      ]
    };
  },
  components: {
  },
  computed: {
    homeLinks() {
      return links.filter(link => link.home);
    }
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
.subheading-wrapper {
  text-align: left !important;
  margin-top: 1em;
  margin-bottom: 1.5em;
}
.content-wrapper {
  width: calc(100% - 30em);
  margin: 2em 15em !important;
}
.link-card {
  width: calc(25% - 2em);
  height: 15em !important;
  transition: 200ms ease-in;
  margin-bottom: 2em;
}
.link-card:not(:nth-child(4n)) {
  margin-right: 2em;
}
.link-icon-wrapper {
  height: 15em;
}
.link-card-wide {
  min-width: calc(37.5% - 2em) !important;
  height: 15em !important;
  transition: 200ms ease-in;
  margin-bottom: 2em;
}
.link-icon {
  justify-self: center !important;
  justify-items: center !important;
  justify-content: center !important;
  margin: 3em 1em;
  height: 5em;
  max-width: 8em;
  border-radius: 0;
}
.link-icon-large {
  max-height: 12em !important;
  max-width: 10em !important;
  border-radius: 0;
}
#link-label {
  text-decoration: none !important;
}
.con-content {
  height: 100%;
  max-height: 100vh;
  overflow: hidden;
  position: relative;
}
.con-content iframe {
  border: 0;
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
}

@media screen and (max-width: 1280px) {
  .heading-wrapper {
    text-align: left !important;
    margin-top: 5em;
    margin-left: 5em;
  }
  .content-wrapper {
    width: calc(100% - 10em);
    margin: 2em 5em !important;
  }
  .link-card {
    width: calc(25% - 2em);
    margin-bottom: 2em;
  }
  .link-card:not(:nth-child(4n)) {
    margin-right: 2em;
  }
  .link-icon {
    justify-self: center !important;
    padding: 0 1em;
    height: 6em;
    max-width: 8em;
  }
}
@media screen and (min-width: 1080px) {
  .link-icon {
    max-height: 12em !important;
    max-width: 5em !important;
  }
  .link-icon-large {
    max-height: 12em !important;
    max-width: 10em !important;
  }
}

@media screen and (max-width: 1080px) {
  .heading-wrapper {
    text-align: left !important;
    margin-top: 5em;
    margin-left: 5em;
  }
  .subheading-wrapper {
    text-align: left !important;
    margin-top: 2em;
    margin-bottom: 1em;
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
    padding: 0 1em;
    height: 6em;
    max-width: 8em;
  }
  .dialog-content {
    width: 90vw;
  }
}
@media screen and (max-width: 640px) {
  .content-wrapper {
    width: calc(100% - 2em);
    margin: 2em 2em !important;
  }
  .heading-wrapper {
    text-align: left !important;
    margin-top: 5em;
    margin-left: 2em;
  }
  .link-icon {
    max-height: 12em !important;
    max-width: 5em !important;
  }
  .link-icon-large {
    max-height: 12em !important;
    max-width: 8em !important;
  }
}
@media screen and (max-width: 400px) {
  .heading-wrapper {
    margin-top: 7em !important;
    margin-left: 1.5em;
  }
  .content-wrapper {
    width: calc(100% - 1em);
    margin: 2em 1.5em !important;
  }
  .link-card {
    width: calc(100%);
    margin-bottom: 2em;
  }
  .link-card:not(:nth-child(1n)) {
    margin-right: 0;
  }
  .link-icon {
    max-height: 5em !important;
    max-width: 8em !important;
  }
  .link-icon-large {
    max-height: 12em !important;
    max-width: 12em !important;
  }
}
@media screen and (min-width: 400px) {
  .link-card:not(:nth-child(n)) {
    margin-right: 0;
    margin-left: 0;
  }
}
</style>

