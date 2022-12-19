<template>
    <div>
        <input class="form-control" type="text" v-model="keyword" @input="handleInput" placeholder="Search Staff..." required>
        <ul class="list-group" v-if="Users.length > 0">
            <a role="button">
                <li class="list-group-item" v-for="user in Users" :key="user.id" v-text="user.first_name + ' ' + user.last_name" @click="autocomplete(user.first_name + ' ' + user.last_name, user.id)"></li>
            </a>
        </ul>
        <input type="text" name="staff_id" v-model="staff_id" hidden>
    </div>
</template>
<script>
export default {
    data() {
        return {
            keyword: null,
            staff_id: null,
            Users: []
        };
    },
    watch: {
        keyword(after, before) {
            this.getResults();
        }
    },
    methods: {
        getResults() {
            axios.get('/staff-search', { params: { keyword: this.keyword } })
                .then(res => this.Users = res.data)
                .catch(error => { });
        },
        handleInput(userInput) {
            this.getResults();
        },
        autocomplete(names, id) {
            // Change "keyword" programmatically
            this.keyword = names;
            this.staff_id = id;

            // Reset to hide autocomplete list
            this.Users = [];
        }
    }
}
</script>