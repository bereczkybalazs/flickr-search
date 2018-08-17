<template>
    <div>
        <input type="text" v-model="keyword">
        <treeselect v-model="keyword" :multiple="false" :options="options"/>
    </div>
</template>

<script>
    import bus from '../../../bus'
    import Treeselect from '@riophae/vue-treeselect'
    import '@riophae/vue-treeselect/dist/vue-treeselect.css'
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
                if (typeof keyword == 'string' && keyword.length > 2) {
                    bus.$emit('searchByKeyword', keyword)
                }
            }
        }
    }
</script>
