<div class="col-md-4 mt-3 rank">
    <h3 class="text-center font-weight-bold">{{ __('translate.top') }}</h3>
    <div class="card card-cascade narrower">
        <table class="table table-striped table-responsive-md btn-table text-center">
            <thead class="rank-top">
                <tr>
                    <th>{{ __('translate.rank') }}</th>
                    <th>{{ __('translate.member') }}</th>
                    <th>{{ __('translate.count_topic') }}</th>
                    <th>{{ __('translate.total_profile') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ranks as $key => $rank)
                    <tr>
                        <th scope="row">{{ $key + config('constants.number_ques') }}</th>
                        <td><img class="avatar" src="{{ config('view.image_paths.images') . $rank['avatar'] }}"> {{ $rank['username'] }}</td>
                        <td>{{ $rank['count'] }}</td>
                        <td>{{ round($rank['total'], config('constants.two')) }}</td>
                    </tr>
                @endforeach
                {{-- {!! $ranks->links() !!} --}}
            </tbody>
        </table>
    </div>
</div>