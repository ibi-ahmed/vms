<template>
  <div>
    <input
      class="form-control"
      type="text"
      :value="keyword"
      @input="handleInput"
    />
    <ul class="list-group" v-if="Users.length > 0">
      <li
        class="list-group-item"
        v-for="user in Users"
        :key="user.id"
        v-text="user.email"
        @click="autocomplete(user.email, user.id)"
      ></li>
    </ul>
  </div>
</template>
<script>

/* Notes
1. It looks like you intend "keyword" to contain an email address.
   In that case, you should probably set the "type" property of
   the input field to "email" to only allow valid email addresses.

2. I remove the <a> tag wrapping the <li> cause I didn't see the role
   it played. <li> should always come directly after <ul>, so if you put
   the <a> back, it should be inside the <li>, not wrapping it.
*/

export default {
    data() {
        return {
            keyword: null,
            id: null,
            Users: []
        };
    },
    
    methods: {
        getResults() {
            axios.get('/staff-search', { params: { keyword: this.keyword } })
                .then(res => this.Users = res.data)
                .catch(error => {});
        },
        handleInput(userInput) {
            // Use this function in place of the watcher to handle the change
            // in "keyword"

            // Otherwise, a staff search request will be made when we change
            // "keyword" programmatically from the user clicking a list item
            this.getResults();
        },
        autocomplete(email, id) {
            // Change "keyword" programmatically
            this.keyword = email;
            this.id = id;

            // Reset to hide autocomplete list
            this.Users = [];
        }
    }

}
</script>
