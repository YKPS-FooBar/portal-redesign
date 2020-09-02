<template>
  <div class="d-flex links justify-content-center">
    <div class="heading-wrapper">
      <h1>Clubs</h1>
    </div>
    <div class="content-wrapper">
      <vs-row vs-justify="center" vs-align="center" class="d-flex card-wrapper">
        <vs-card class="link-card" v-for="item in Clubs" v-bind:key="item.index">
          <a @click="openConfirm()" style="color: #000" v-bind:index="item.index">
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
<!--        <v-dialog v-model="dialog" max-width="290pt">-->
<!--          <v-card>-->
<!--            <v-card-title class="headline grey lighten-2" v-for="item in Clubs" :key="item.index">-->
<!--              {{ item.name }}-->
<!--            </v-card-title>-->

<!--            <v-card-text>-->
<!--              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.-->
<!--            </v-card-text>-->

<!--            <v-divider></v-divider>-->

<!--            <v-card-actions>-->
<!--              <v-spacer></v-spacer>-->
<!--              <v-btn-->
<!--                  color="primary"-->
<!--                  text-->
<!--                  @click="dialog = false"-->
<!--              >-->
<!--                Close-->
<!--              </v-btn>-->
<!--            </v-card-actions>-->
<!--          </v-card>-->
<!--        </v-dialog>-->
      </vs-row>
    </div>
  </div>
</template>

<script>
import Clubs from "@/data/clubs.json";
export default {
  name: 'Clubs',
  props: {name},
  components: {
  },
  data:() => ({
    activeConfirm:false
  }),
  computed: {
    Clubs() {
      return Clubs.map(el => {
            return {
              ...el,
            }
          })
    }
  },
  methods:{
    openConfirm(){
      console.log(this.item.name),
      this.$vs.dialog({
        type:'confirm',
        color: 'primary',
        title: this.item.name,
        text: 'Lorem ipsum.',
        accept:this.acceptAlert
      })
    },
    // acceptAlert(color){
    //   this.$vs.notify({
    //     color:'danger',
    //     title:'Deleted image',
    //     text:'The selected image was successfully deleted'
    //   })
    // },
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
  transition: 200ms ease-out;
}
.link-icon-wrapper {
  height: 15em;
}
.link-icon {
  justify-self: center !important;
  padding: 2em 0;
  max-height: 15em;
}

@media screen and (min-width: 1280px) {
  .link-card:not(:nth-child(4n)) {
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
