<div class="tab-pane in active" id="cfeed">
	<form id="articlecustom" class="my-2" action="#" method="post"
		enctype="multipart/form-data">
		<div class="form-group">
			<label for="category">Select Category</label> <select
				class="form-control" name="category" id="category">
				<option value="-1" select>Select Category</option>
				<option value="entertainment">Entertainment</option>
				<option value="bollywood">Bollywood</option>
			</select>
		</div>

		<div class="form-group">
			<label for="article-title">Article Title</label> <input type="text"
				class="form-control" name="article-title" id="article-title"
				placeholder="Enter your Article Title">
		</div>

		<div class="form-group">
			<label for="article-url">Article Url</label> <input type="text"
				class="form-control" name="article-url" id="article-url"
				placeholder="Enter your Article Url">
		</div>

		<div class="form-group">
			<label for="article-image">Article Image</label> <input type="file"
				class="form-control" name="article-image" id="article-image"
				accept="image/*" />
		</div>

		<div class="form-group">
			<label for="article-content">Article Content</label>
			<div class="input-group">
				<textarea class="form-control" rows="10" name="article-content"
					placeholder="Enter Article Content.."></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="article-tags">Article Tags</label> <input type="text"
				class="form-control" name="article-tags" id="article-tags"
				placeholder="Enter tags ( Use Comma Seperated for multiple tags )">
		</div>

		<div class="form-group">
			<label for="reference-url">Reference Url</label> <input type="text"
				class="form-control" name="reference-url" id="reference-url"
				placeholder="Enter Article Reference Url">
		</div>
		<input type="hidden" name="action" value="createpost" />
		<div class="form-group text-center">
			<button type="submit" class="btn btn-block btn-primary">Post</button>
		</div>
	</form>
</div>