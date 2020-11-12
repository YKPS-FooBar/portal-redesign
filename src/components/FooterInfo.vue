<template>
  <div class="footer-wrapper">
    <span class="footer">
      Designed by <a class="footer-link" href="https://tigerfeng.cn">Tiger Feng</a>
      <span style="margin-left: .5em; margin-right: .5em;">|</span>Developed by
      <a class="footer-link" href="https://github.com/orgs/YKPS-FooBar/">The Foo Bar</a>
    </span>
  </div>
</template>

<script>
export default {
  name: 'FooterInfo'
}
</script>

<style lang="scss" scoped>
.footer-wrapper {
  margin: 1.5em auto;
}

.footer {
  color: #aaa;
  font-size: 12pt;
  font-weight: 400;
  line-height: 20pt;
}

.footer-link {
  color: inherit;
  transition: ease-in-out 200ms;
  &:hover {
    color: #444;
  }
}
</style>
