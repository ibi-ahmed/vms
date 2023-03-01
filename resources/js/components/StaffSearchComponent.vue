<template>
    <div>
        <input class="form-control" type="text" v-model="keyword" @input="handleInput" placeholder="Search Staff..."
            required>
        <ul class="list-group" v-if="response.length > 0">
            <a role="button">
                <li class="list-group-item" v-for="user in response" :key="user.id" @click="autocomplete(user)">
                    {{ user.displayName }}
                </li>
            </a>
        </ul>
        <input type="text" name="staff_id" v-model="staff_id" hidden>
        <input type="text" name="staff_name" v-model="staff_name" hidden>
        <input type="text" name="staff_email" v-model="staff_email" hidden>
    </div>
</template>

<script>
import _ from 'lodash';
export default {
    data() {
        return {
            keyword: null,
            staff_id: null,
            staff_name: null,
            staff_email: null,
            response: [],
        };
    },
    created() {
        const delay = 500; // delay in milliseconds
        this.debouncedGetResults = _.debounce(this.getResults, delay);
    },
    methods: {
        getResults() {
            axios.get('/staff-search', { params: { keyword: this.keyword } })
                .then(res => this.response = res.data)
                .catch(error => { });
        },
        handleInput(userInput) {
            this.debouncedGetResults();
        },
        autocomplete(user) {
            this.keyword = user.displayName;
            this.staff_id = user.id;
            this.staff_name = user.displayName;
            this.staff_email = user.mail;
            this.response = [];
        },
    },
};
</script>
