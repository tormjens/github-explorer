class Api {

	constructor() {
		this.baseUrl = 'https://api.github.com/search/repositories';
		this.currentPage = 1;
		this.per_page = 20;
		this.searchString = '';
	}

	search(query, type) {
		var search = this.buildSearch(query, type);
		this.searchString = search;
		this.currentPage = 1;
		return this;
	}

	page(page) {
		this.currentPage = page;
		return this;
	}

	buildSearch(query, type) {
		query += ' wordpress '+ type +' in:name,description,readme language:php';
		var search = query.replace(' ', '+');
		return search;
	}

	request(callback) {
		var data = {
			q: this.searchString,
			sort: 'repositories',
			order: 'desc',
			page: this.currentPage,
			per_page: this.per_page
		};

		jQuery.get(this.baseUrl, data, (response) => {
			console.log(response);
			callback(response);
		});
	}

}

export default Api;
