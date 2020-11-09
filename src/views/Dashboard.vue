<template>
<!--  <div class="d-flex dashboard">-->
<!--    <div class="heading-wrapper">-->
<!--      <h1>Dashboard</h1>-->
<!--    </div>-->
<!--    <div class="content-wrapper justify-content-center">-->
<!--      <vs-row vs-justify="center" vs-align="center" class="d-flex card-wrapper">-->
<!--        <vs-card class="link-card" primary>-->
<!--          <template #img>-->
<!--            <div class="d-flex link-icon-wrapper justify-items-center justify-content-center">-->
<!--              <a href="https://powerschool.ykpaoschool.cn/public/" style="color: #000; text-decoration: none !important;">-->
<!--                <div style="width: 100%;">-->
<!--                  <img src="../../public/images/icons/powerschool.svg" class="link-icon" style="width: 100% !important;"/>-->
<!--                </div>-->
<!--                <h3 style="word-wrap: break-spaces; width: 100%">PowerSchool</h3>-->
<!--              </a>-->
<!--            </div>-->
<!--          </template>-->
<!--        </vs-card>-->
<!--      </vs-row>-->
<!--    </div>-->
<!--  </div>-->

  <div class="d-flex dashboard">
    <div class="heading-wrapper">
      <h1>Dashboard</h1>
    </div>
    <div class="content-wrapper justify-content-center">
      <div class="subheading-wrapper">
        <h2>Latest Info</h2>
      </div>
      <vs-row vs-justify="center" vs-align="center" class="d-flex card-wrapper">
        <vs-card @click="active=!active" class="link-card bulletin-card" primary>
          <template #img>
            <div class="d-flex link-icon-wrapper justify-items-center justify-content-center">
              <a style="color: #000; text-decoration: none !important;">
                <div style="width: 100%;">
                  <p style="line-height: 1.75;"><br></p>
                  <img src="../../public/images/icons/dailybulletin.svg" class="link-icon link-icon-large" style="width: 100% !important;"/>
                </div>
              </a>
            </div>
          </template>
        </vs-card>
        <vs-dialog overflow-hidden full-screen blur not-padding v-model="active">
          <div class="con-content">
            <iframe class="embed-responsive-item" src="./images/icons/daily-bulletin.pdf" scrolling="auto" height="1070"></iframe>
          </div>
        </vs-dialog>
        <vs-card @click="active2=!active2" class="link-card updates-card" primary>
          <template #img>
            <div class="d-flex link-icon-wrapper justify-items-center justify-content-center">
              <a style="color: #000; text-decoration: none !important;">
                <div style="width: 100%;">
                  <p style="line-height: 1.75;"><br></p>
                  <img src="../../public/images/icons/newsupddates.svg" class="link-icon link-icon-large" style="width: 100% !important;"/>
                </div>
              </a>
            </div>
          </template>
        </vs-card>
        <vs-dialog overflow-hidden full-screen blur not-padding v-model="active2">
          <div class="con-content">
            <iframe class="embed-responsive-item" src="./images/icons/news-updates.pdf" scrolling="auto" height="1070"></iframe>
          </div>
        </vs-dialog>
      </vs-row>
      <div class="subheading-wrapper">
        <h2>Common Links</h2>
      </div>
      <vs-row vs-justify="center" vs-align="center" class="d-flex card-wrapper">
        <vs-card class="link-card" primary>
          <template #img>
            <div class="d-flex link-icon-wrapper justify-items-center justify-content-center">
              <a href="https://powerschool.ykpaoschool.cn/public/" style="color: #000; text-decoration: none !important;">
                <div style="width: 100%;">
                  <img src="../../public/images/icons/powerschool.svg" class="link-icon" style="width: 100% !important;"/>
                </div>
                <h3 style="word-wrap: break-spaces; width: 100%">PowerSchool</h3>
              </a>
            </div>
          </template>
        </vs-card>
        <vs-card class="link-card" primary>
          <template #img>
            <div class="d-flex link-icon-wrapper justify-items-center justify-content-center">
              <a href="https://powerschool.ykpaoschool.cn/teachers/pw.html" style="color: #000; text-decoration: none !important;">
                <div style="width: 100%;">
                  <img src="../../public/images/icons/powerschool.svg" class="link-icon" style="width: 100% !important;"/>
                </div>
                <h3 style="word-wrap: break-spaces; width: 100%">PowerTeacher</h3>
              </a>
            </div>
          </template>
        </vs-card>
        <vs-card class="link-card" primary>
          <template #img>
            <div class="d-flex link-icon-wrapper justify-items-center justify-content-center">
              <a href="https://ykpaoschool.learning.powerschool.com/" style="color: #000; text-decoration: none !important;">
                <div style="width: 100%;">
                  <img src="../../public/images/icons/Power_School.svg" class="link-icon" style="width: 100% !important;"/>
                </div>
                <h3 style="word-wrap: break-spaces; width: 100%">PS Learning</h3>
              </a>
            </div>
          </template>
        </vs-card>
        <vs-card class="link-card" primary>
          <template #img>
            <div class="d-flex link-icon-wrapper justify-items-center justify-content-center">
              <a href="https://ykps.managebac.cn/" style="color: #000; text-decoration: none !important;">
                <div style="width: 100%;">
                  <img src="../../public/images/icons/managebac.svg" class="link-icon" style="width: 100% !important;"/>
                </div>
                <h3 style="word-wrap: break-spaces; width: 100%">ManageBac</h3>
              </a>
            </div>
          </template>
        </vs-card>
        <vs-card class="link-card" primary>
          <template #img>
            <div class="d-flex link-icon-wrapper justify-items-center justify-content-center">
              <a href="https://ykpaoschool.learning.powerschool.com/" style="color: #000; text-decoration: none !important;">
                <div style="width: 100%;">
                  <img src="../../public/images/icons/outlook.svg" class="link-icon" style="width: 100% !important;"/>
                </div>
                <h3 style="word-wrap: break-spaces; width: 100%">Mail</h3>
              </a>
            </div>
          </template>
        </vs-card>
        <vs-card class="link-card" primary>
          <template #img>
            <div class="d-flex link-icon-wrapper justify-items-center justify-content-center">
              <a href="https://outlook.office.com/owa/?realm=ykpaoschool.cn#path=/calendar/view/month" style="color: #000; text-decoration: none !important;">
                <div style="width: 100%;">
                  <img src="../../public/images/icons/calendar.svg" class="link-icon" style="width: 100% !important;"/>
                </div>
                <h3 style="word-wrap: break-spaces; width: 100%">Calendar</h3>
              </a>
            </div>
          </template>
        </vs-card>
        <vs-card class="link-card" primary>
          <template #img>
            <div class="d-flex link-icon-wrapper justify-items-center justify-content-center">
              <a href="https://ykpaoschool-my.sharepoint.com/_layouts/15/MySite.aspx?MySiteRedirect=AllDocuments" style="color: #000; text-decoration: none !important;">
                <div style="width: 100%;">
                  <img src="../../public/images/icons/onedrive.svg" class="link-icon" style="width: 100% !important;"/>
                </div>
                <h3 style="word-wrap: break-spaces; width: 100%">OneDrive</h3>
              </a>
            </div>
          </template>
        </vs-card>
        <vs-card class="link-card" primary>
          <template #img>
            <div class="d-flex link-icon-wrapper justify-items-center justify-content-center">
              <a href="https://seasia.mychq.net/ykpao" style="color: #000; text-decoration: none !important;">
                <div style="width: 100%;">
                  <img src="../../public/images/icons/chq.svg" class="link-icon" style="width: 100% !important;"/>
                </div>
                <h3 style="word-wrap: break-spaces; width: 100%">CHQ</h3>
              </a>
            </div>
          </template>
        </vs-card>
      </vs-row>
    </div>
    <div class="footer-wrapper">
      <span class="footer">Designed by <a class="footer-link" href="https://tigerfeng.cn">Tiger Feng</a>
        <span style="opacity: 0">--</span>|<span style="opacity: 0">--</span>Developed by <a class="footer-link" href="https://github.com/orgs/YKPS-FooBar/">FooBar</a>
      </span>
    </div>
  </div>
</template>

<script>
import links from "@/data/links.json";
export default {
  name: 'Dashboard',
  props: ['name','icon'],
  data:() => ({
    active: false,
    active2: false,
    input1: '',
    input2: '',
    checkbox1: false
  }),
  components: {
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
.vs-dialog__content .vs-dialog--scroll {
  max-height: 100%;
}
.con-content {
  max-height: 100vh;
  overflow: hidden;
  /* 16:9 aspect ratio */
  padding-top: 56.25%;
  position: relative;
}
.con-content iframe {
  border: 0;
  height: 100%;
  left: 0;
  position: absolute;
  top: 0;
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

