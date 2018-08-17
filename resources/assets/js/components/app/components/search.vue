<template>
    <div class="search-container">
        <div class="text-center">
            <h1>Flickr search</h1>
        </div>
        <input type="text" v-model="keyword" class="form-control" placeholder="Search...">
        <treeselect v-model="keyword" :multiple="false" :options="options"/>
        <button class="btn btn-success btn-block" @click.prevent="searchByKeyword(keyword)">Search</button>
    </div>
</template>

<script>
    import bus from '../../../bus'
    import Treeselect from '@riophae/vue-treeselect'
    import config from '../../../config'

    export default {
        mounted () {
            this.options = config.searchOptions
        },
        data () {
            return {
                keyword: '',
                value: null,
                options: []
            }
        },
        components: {
            Treeselect
        },
        watch: {
            keyword (keyword) {
                this.searchByKeyword(keyword)
            }
        },
        methods: {
            searchByKeyword: keyword => {
                if (typeof keyword == 'string' && keyword.length > 2) {
                    bus.$emit('searchByKeyword', keyword)
                }
            }
        }
    }
</script>
