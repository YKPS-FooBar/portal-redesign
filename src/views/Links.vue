<template>
  <div class="d-flex links">
    <div class="heading-wrapper">
      <h1>Links</h1>
    </div>
    <div class="content-wrapper justify-content-center">
      <vs-row vs-justify="center" vs-align="center" class="d-flex card-wrapper">
<!--        <vs-card class="link-card" v-for="item in links" v-bind:key="item.name">-->
<!--          <a :href="`${item.url}`" style="color: #000">-->
<!--            <div slot="media" class="d-flex link-icon-wrapper justify-items-center">-->
<!--              <img v-if="item.icon" :src="require(`../../public/images/icons/${item.icon}`)" class="link-icon"/>-->
<!--            </div>-->
<!--            <div>-->
<!--              <div id="link-label">-->
<!--                {{ item.name }}-->
<!--              </div>-->
<!--            </div>-->
<!--          </a>-->
<!--        </vs-card>-->
        <vs-card class="link-card" v-for="item in links" v-bind:key="item.name" primary>
          <template #img>
            <div class="d-flex link-icon-wrapper justify-items-center justify-content-center">
              <a :href="`${item.url}`" style="color: #000; text-decoration: none !important;">
                <div class="img-wrapper" style="width: 100%;">
                  <img v-if="item.icon" :src="require(`../../public/images/icons/${item.icon}`)" class="link-icon" style="width: 100% !important;"/>
                </div>
                <h3 style="word-wrap: break-spaces; width: 100%">{{ item.name }}</h3>
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
  name: 'Links',
  props: ['name','icon'],
  data() {
    return {
      tab: null,
    }
  },
  computed: {
    links() {
      return links
          .map(el => {
            return {
              ...el,
            }
          })
    }
  }
}
</script>

<style scoped>
a {
  width: 100%;
  height: 100%;
}
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
.footer-wrapper {
  margin-bottom: 3em;
}
.footer {
  color: #aaa;
  font-size: 12pt;
  font-weight: 400;
  line-height: 20pt;
}
.footer-link {
  color: #aaa;
  transition: ease-in-out 200ms;
}
.footer-link:hover {
  color: #444;
  transition: ease-in-out 200ms;
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
.img-wrapper {
  justify-items: center !important;
}
.link-icon {
  justify-self: center !important;
  justify-items: center !important;
  justify-content: center !important;
  margin: 3em 2em;
  height: 5em;
  max-width: 8em;
  border-radius: 0 !important;
}
.link-icon-large {
  max-height: 12em !important;
  max-width: 10em !important;
  border-radius: 0 !important;
}
#link-label {
  text-decoration: none !important;
}
.vs-dialog__content .vs-dialog--scroll {
  max-height: 100%;
}
.con-content {
  max-height: 100vh;
}
.embed-responsive-item {
  border-radius: 10pt;
  border: none;
  width: 100%;
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
  .footer {
    color: #aaa !important;
    font-size: 14pt;
    font-weight: 400;
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
  .footer {
    color: #aaa !important;
    font-size: 12pt;
    font-weight: 400;
  }
}
@media screen and (min-width: 400px) {
  .link-card:not(:nth-child(n)) {
    margin-right: 0;
    margin-left: 0;
  }
}
</style>
