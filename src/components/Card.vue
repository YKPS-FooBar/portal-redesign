<template>
  <!-- this sequence of div > b-card > b-link > b-card-body.hover-shadow might seem weird -->
  <!-- but it ensures that the hitbox of <a> & tab sequence & stylesheet don't mess up -->
  <div class="mb-5">
    <b-card no-body class="font-weight-bold text-center" style="width: 12em; height: 12em;">
      <b-link :href="link" v-b-modal="modal" class="flex-grow-1 h-100 d-flex text-decoration-none text-reset">
        <b-card-body class="d-flex flex-column align-items-stretch justify-content-between hover-shadow">
          <b-card-img :src="require(`../../public/images/icons/${icon}`)" :alt="named ? 'Icon' : name" class="flex-grow-1 flex-shrink-1" :class="named ? 'p-3 h-75' : ''" style="object-fit: contain;"></b-card-img>
          <b-card-text v-if="named">
            {{ name }}
          </b-card-text>
        </b-card-body>
      </b-link>
    </b-card>
  </div>
</template>

<script>
export default {
  name: 'Card',
  props: {
    'link': String,
    'modal': String,
    'icon': String,
    'name': String,
    'named': Boolean
  }
}
</script>

<style lang="scss" scoped>
.hover-shadow {
  box-shadow: 0 .5em 1.5em rgba(0, 0, 0, 0.2);
  transition: box-shadow 200ms ease, padding 200ms ease;

  /* Hover <b-card> or focus (using tab etc) <b-link> */
  &:hover, :focus > & {
    box-shadow: 0 .5em 1.5em rgba(0, 0, 0, 0.5);
    padding: 1em;
  }
}
</style>
