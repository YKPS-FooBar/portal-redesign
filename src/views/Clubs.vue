<template>
  <main>
    <b-container>
      <h1>Clubs</h1>

      <b-card-group deck style="max-width: 60em;">
        <Card v-for="club in clubs" :key="club.name" :modal="`modal-${club.name}`" :icon="club.icon" :name="club.name" named />
      </b-card-group>

      <b-modal v-for="club in clubs" :key="`modal-${club.name}`" :id="`modal-${club.name}`" centered  hide-footer :title="club.name">
        {{ club.desc }}
      </b-modal>
    </b-container>
  </main>
</template>

<script>
import Card from '@/components/Card.vue'
import clubs from '@/data/clubs.json'

export default {
  name: 'Clubs',
  components: {
    Card
  },
  computed: {
    clubs: () => clubs
  }
}
</script>
