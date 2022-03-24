<template>
  <div class="">
      <h1>Contacts</h1>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Name</span>
        <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1" v-model="formData.contact_name">
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Email</span>
        <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" v-model="formData.email">
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text">Content</span>
        <textarea class="form-control" aria-label="Content" v-model="formData.content"></textarea>
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Attachment</span>
        <input type="file" class="form-control" placeholder="Attachment" aria-label="Attachment" aria-describedby="basic-addon1" @change="onChangeAttachmentFile">
      </div>

      <div>
        <button type="submit" class="btn btn-success" @click="submitContent">Save</button>
      </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      formData: {
        contact_name: "",
        email: "",
        content: "",
        attachment: null,
      },
    };
  },
  methods: {
    async submitContent() {

      const formDataInstance = new FormData();
      formDataInstance.append('contact_name', this.formData.contact_name);
      formDataInstance.append('email', this.formData.email);
      formDataInstance.append('content', this.formData.content);
      if(this.formData.attachment) {
        formDataInstance.append('attachment', this.formData.attachment);
      }

      const response = await axios.post("/api/contacts", formDataInstance);

    },
    onChangeAttachmentFile(event) {
      // event.target.files

      this.formData.attachment = event.target.files[0];
    }
  },
}
</script>

<style>

</style>