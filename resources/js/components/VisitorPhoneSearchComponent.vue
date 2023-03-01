<template>
    <div>
        <input class="form-control" name="visitor_phone" type="phone" v-model="keyword" @input="handleInput" placeholder="Search Visitor Phone...">
        <ul class="list-group" v-if="Visitors.length > 0">
            <a role="button">
                <li class="list-group-item" v-for="visitor in Visitors" :key="visitor.id" v-text="visitor.last_name" @click="autocomplete(visitor.last_name)"></li>
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
            axios.get('/visitor-search-phone', { params: { keyword: this.keyword } })
                .then(res => this.Visitors = res.data)
                .catch(error => { });
        },
        handleInput(visitorInput) {
            this.getResults();
        },
        autocomplete(name) {
            // Change "keyword" programmatically
            this.keyword = name;

            // Reset to hide autocomplete list
            this.Visitors = [];
        }
    }
}
</script>