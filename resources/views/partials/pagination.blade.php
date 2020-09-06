<div class="datatable-footer mb-4 mt-4">
    <div class="heading-elements">
        @if(strpos(url()->current(), 'a-check') === false)
            <span class="heading-text header-text-footer text-semibold float-left">
            <select name="perPage" class="select">
                <option @if(isset($perPage) && $perPage == 20) selected
                        @endif value="20">20</option>
                <option @if(isset($perPage) && $perPage == 50) selected
                        @endif  value="50">50</option>
                <option @if(isset($perPage) && $perPage == 100) selected
                        @endif  value="100">100</option>
                <option @if(isset($perPage) && $perPage == 200) selected
                        @endif  value="200">200</option>
            </select>
        </span>
        @endif
        <ul class="pagination pagination-separated pull-right float-right">
            {{ $results->links('vendor.pagination.bootstrap-4') }}
        </ul>
    </div>
</div>
