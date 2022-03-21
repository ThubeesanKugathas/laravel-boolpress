<template>
  <div class="">
      <h1>Contacts</h1>
      <ul class="mb-3" v-for="contact in contacts" :key="contact.id">
        <li>
          <h3>Name:{{ contact.contact_name }}</h3>
          <h3>Email:{{ contact.email }}</h3>
        </li>
      </ul>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      contacts: []
    }
  },
  methods: {
    async getContact() {
      const response = await axios.get("http://127.0.0.1:8000/api/contacts");
      this.contacts = response.data;
    }
  },
  mounted() {
    this.getContact();
  }
}
</script>

<style>

</style>