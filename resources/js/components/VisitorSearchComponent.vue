<template>
    <div>
        <input class="form-control" name="visitor_email" type="email" v-model="keyword" @input="handleInput" placeholder="Search Visitor...">
        <ul class="list-group" v-if="Visitors.length > 0">
            <a role="button">
                <li class="list-group-item" v-for="visitor in Visitors" :key="visitor.id" v-text="visitor.email" @click="autocomplete(visitor.email)"></li>
            </a>
        </ul>
    </div>
</template>
<script>
export default {
    data() {
        return {
            keyword: null,
            Visitors: []
        };
    },
    watch: {
        keyword(after, before) {
            this.getResults();
        }
    },
    methods: {
        getResults() {
            axios.get('/visitor-search', { params: { keyword: this.keyword } })
                .then(res => this.Visitors = res.data)
                .catch(error => { });
        },
        handleInput(visitorInput) {
            this.getResults();
        },
        autocomplete(email) {
            // Change "keyword" programmatically
            this.keyword = email;

            // Reset to hide autocomplete list
            this.Visitors = [];
        }
    }
}
</script>