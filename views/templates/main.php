
<div class="github-explorer-container">

	<br class="clear">

	<p>{{options.title}}</p>

	<div class="wp-filter">
		<form class="search-form search-plugins" @submit.prevent="onSearch" style="float:left">
			<input type="hidden" name="tab" value="search">
				<input type="search" v-model="search" class="wp-filter-search" placeholder="{{options.search}}">
			</label>
			<input type="submit" id="search-submit" class="button" value="{{options.search}}">
		</form>
	</div>

	<div class="github-explorer-results" v-if="items.length > 0">
		<div class="tablenav top">
			<div class="tablenav-pages">
				<span class="displaying-num">{{results}} items</span>
				<span class="pagination-links">
					<a class="first-page" @click.prevent="firstPage">
						<span aria-hidden="true">«</span>
					</a>
					<a class="prev-page" @click.prevent="prevPage">
						<span aria-hidden="true">‹</span>
					</a>
					<span class="paging-input">
						<input class="current-page" id="current-page-selector" type="text" v-model="page" size="2" aria-describedby="table-paging">
						of <span class="total-pages">{{pages}}</span>
					</span>
					<a class="next-page" @click.prevent="nextPage">
						<span aria-hidden="true">›</span>
					</a>
					<a class="last-page" @click.prevent="lastPage">
						<span aria-hidden="true">»</span>
					</a>
				</span>
			</div>
			<br class="clear">
		</div>
		<div class="wp-list-table widefat plugin-install">
			<div id="the-list">
				<div class="plugin-card plugin-card-woo-custom-emails" v-for="item in items">
					<div class="plugin-card-top">
						<div class="name column-name">
							<h3>
								<a href="http://wp-blade.dev/wp-admin/plugin-install.php?tab=plugin-information&amp;plugin=woo-custom-emails&amp;TB_iframe=true&amp;width=600&amp;height=550" class="thickbox open-plugin-details-modal">
								{{item.name}}						<img src="//ps.w.org/woo-custom-emails/assets/icon-256x256.png?rev=1226828" class="plugin-icon" alt="">
								</a>
							</h3>
						</div>
						<div class="action-links">
							<ul class="plugin-action-buttons"><li><a class="install-now button" data-slug="woo-custom-emails" href="http://wp-blade.dev/wp-admin/update.php?action=install-plugin&amp;plugin=woo-custom-emails&amp;_wpnonce=e1f023d7e9" aria-label="Install Woo Custom Emails 2.0.6 now" data-name="Woo Custom Emails 2.0.6">Install Now</a></li><li><a href="http://wp-blade.dev/wp-admin/plugin-install.php?tab=plugin-information&amp;plugin=woo-custom-emails&amp;TB_iframe=true&amp;width=600&amp;height=550" class="thickbox open-plugin-details-modal" aria-label="More information about Woo Custom Emails 2.0.6" data-title="Woo Custom Emails 2.0.6">More Details</a></li></ul>				</div>
						<div class="desc column-description">
							<p>{{item.description}}</p>
							<p class="authors"> <cite>By <a href="http://wp3sixty.com">wp3sixty</a></cite></p>
						</div>
					</div>
					<div class="plugin-card-bottom">
						<div class="vers column-rating">
							<div class="star-rating"><span class="screen-reader-text">4.0 rating based on 5 ratings</span><div class="star star-full"></div><div class="star star-full"></div><div class="star star-full"></div><div class="star star-full"></div><div class="star star-empty"></div></div>					<span class="num-ratings" aria-hidden="true">(5)</span>
						</div>
						<div class="column-updated">
							<strong>Last Updated:</strong> 4 weeks ago				</div>
						<div class="column-downloaded">
							600+ Active Installs				</div>
						<div class="column-compatibility">
							<span class="compatibility-compatible"><strong>Compatible</strong> with your version of WordPress</span>				</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
