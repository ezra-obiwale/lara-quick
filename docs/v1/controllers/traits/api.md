# Api Trait

<p class="tip">
This trait uses the [Crud trait](/v1/controllers/traits/crud).
</p>

This trait implements the response methods of the [Crud trait](/v1/controllers/traits/crud).
It is meant to be used on controllers meant for API endpoints.

## Implemented Methods

### indexResponse ( `...` )

<p class="tip no-bg">
    protected function indexResponse ( `mixed` $data ) : `Illuminate\Http\Response`
</p>

Returns the [Respond trait's paginatedList](/v1/controllers/traits/respond#paginatedlist-)
method response after applying it to the `$data`.

### storeResponse ( `...` )

<p class="tip no-bg">
    protected function storeResponse ( `Illuminate\Database\Eloquent\Model` $data ) : `Illuminate\Http\Response`
</p>

Returns `$data` with response code 201

### showResponse ( `...` )

<p class="tip no-bg">
    protected function showResponse ( `Illuminate\Database\Eloquent\Model` $data ) : `Illuminate\Http\Response`
</p>

Returns `$data` with response code 200

### updateResponse ( `...` )

<p class="tip no-bg">
    protected function updateResponse ( `Illuminate\Database\Eloquent\Model` $data ) : `Illuminate\Http\Response`
</p>

Returns `$data` with response code 202

### deleteResponse ( `...` )

<p class="tip no-bg">
    protected function deleteResponse ( `Illuminate\Database\Eloquent\Model` $data ) : `Illuminate\Http\Response`
</p>

Returns `$data` with response code 202

### deleteManyResponse ( `...` )

<p class="tip no-bg">
    protected function deleteManyResponse ( `integer` $deletedCount ) : `Illuminate\Http\Response`
</p>

Returns a message bearing the number of successfully deleted item.
The response code is 202.