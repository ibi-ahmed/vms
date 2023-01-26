<template>
    <div>
        <input class="form-control" type="text" v-model="keyword" @input="handleInput" placeholder="Search Visitor..." required>
        <ul class="list-group" v-if="Visitors.length > 0">
            <a role="button">
                <li class="list-group-item" v-for="visitor in Visitors" :key="visitor.id" v-text="visitor.first_name + ' ' + visitor.last_name" @click="autocomplete(visitor.first_name + ' ' + visitor.last_name, visitor.id)"></li>
            </a>
        </ul>
    </div>
</template>
<script>
export default {
    data() {
        return {
            keyword: null,
            vis_id: null,
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
            axios.get('/all-visitor', { params: { keyword: this.keyword } })
                .then(res => this.Visitors = res.data)
                .catch(error => { });
        },
        handleInput(visitorInput) {
            this.getResults();
        },
        autocomplete(names, id) {
            // Change "keyword" programmatically
            this.keyword = names;
            this.vis_id = id;

            // Reset to hide autocomplete list
            this.Visitors = [];
        }
    }
}
</script>