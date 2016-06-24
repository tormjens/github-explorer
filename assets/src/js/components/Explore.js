import Vue from 'vue'
import Api from './api'

var api = new Api();

var Explore = Vue.extend({
	template: '#ge-template-main',
	data() {
		return {
			search: '',
			page: 1,
			results: 0,
			pages: 0,
			options: {},
			items: []
		}
	},
	ready() {
		this.options = GithubExplorer;
	},
	methods: {
		onSearch() {
			this.page = 1;
			api.search(this.search, this.options.type).request((response) => {
				this.results = response.total_count;
				this.pages = Math.ceil(this.results / 20);
				this.items = response.items;
			});
		},
		goToPage(page) {
			api.page(page).request((response) => {
				this.page = page;
				this.items = response.items;
			});
		},
		prevPage() {
			this.page--;
			if(this.page < 1)
				this.page = 1;
			this.goToPage(this.page);
		},
		firstPage() {
			this.page = 1;
			this.goToPage(this.page);
		},
		nextPage() {
			this.page++;
			if(this.page < 1)
				this.page = 1;
			this.goToPage(this.page);
		},
		lastPage() {
			this.goToPage(this.pages);
		}
	}
});

export default Explore;
