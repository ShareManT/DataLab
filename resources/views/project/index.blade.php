@extends( 'layout.app' )
@section( 'title', '项目' )
@section( 'content' )
        <div class="mdui-row">
            @if( $projects->count() == 0 )
                <h5>NO Project.</h5>
            @else
                @each('project.item',$projects,'project')
            @endif
        </div>
        <div class="mdui-row">
            @if($projects->lastPage() > 1)
                {{ $projects->links() }}
            @endif
        </div>
@endsection