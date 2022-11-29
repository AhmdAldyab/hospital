    <!-- delete_modal_Doctor -->
    <div class="modal fade" id="Delete_nurse{{ $nurse->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('doctor.delete') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('nurse.destroy', 'test') }}" method="post">
                        {{ method_field('Delete') }}
                        @csrf
                        {{ trans('doctor.Warning_Doctor') }}
                        <input type="hidden" name="name" id="id" value="{{$nurse->getTranslation('name','en')}}">
                        <input id="id" type="hidden" name="id" class="form-control"
                            value="{{ $nurse->id }}">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('doctor.close') }}</button>
                            <button type="submit" class="btn btn-danger">{{ trans('doctor.delete') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
