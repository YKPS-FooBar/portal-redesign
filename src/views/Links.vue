<template>
  <div class="d-flex links justify-content-center">
    <div class="heading-wrapper">
      <h1>Links</h1>
    </div>
    <div class="content-wrapper">
      <vs-row vs-justify="center" vs-align="center" class="d-flex card-wrapper">
        <vs-card class="link-card" v-for="item in links" v-bind:key="item.name">
          <a :href="`${item.url}`" style="color: #000">
            <div slot="media" class="d-flex link-icon-wrapper justify-items-center">
              <img v-if="item.icon" :src="require(`../../public/images/icons/${item.icon}`)" class="link-icon"/>
            </div>
            <div>
              <div id="link-label">
                {{ item.name }}
              </div>
            </div>
          </a>
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
.heading-wrapper {
  margin-top: 5em;
}
.content-wrapper {
  width: calc(100% - 30em);
  margin: 2em 15em !important;
}
.link-card {
  width: calc(25% - 2em);
  height: 15em !important;
  transition: 200ms ease-in;
}
.link-card:hover {
  box-shadow: 0 6px 40px 0 rgba(0,0,0,.1);
  transform: scale(1.025,1.025);
  transition: 150ms ease-out;
}
.link-icon-wrapper {
  height: 15em;
}
.link-icon {
  justify-self: center !important;
  padding: 5em 0;
  max-height: 15em;
  max-width: 10em;
}

@media screen and (min-width: 1280px) {
  .link-card:not(:nth-last-child(4n)) {
    margin-right: 2em;
  }
}

@media screen and (max-width: 1280px) {
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
    max-height: 15em;
    max-width: 20em;
  }
}
@media screen and (max-width: 800px) {
  .heading-wrapper {
    margin-top: 3em;
  }
  .content-wrapper {
    width: calc(100% - 1em);
    margin: 2em 0.5em !important;
  }
}
</style>
