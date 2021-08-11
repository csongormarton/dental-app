<div class="hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="reservation-modal">
    <div class="bg-white shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                @lang('template.add_new_reservation')
            </h3>
            <form>
                <div class="mt-5">
                    <span class="text-gray-700">@lang('template.client_name')</span>
                    <div class="mt-2">
                        <input id="client-name" class="border rounded w-full shadow-sm py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline rounded-md" type="text">
                        <p id="client-name-required" class="hidden mt-2 text-red-600">{{ __('validation.required', ['attribute' => __('template.client_name')]) }}</p>
                    </div>
                </div>

                <div class="mt-5">
                    <span class="text-gray-700">@lang('template.repeat')</span>
                    <div class="mt-2">
                        @foreach($reservationTypes as $index => $reservationType)
                            <label class="ml-2 inline-flex items-center text-gray-600">
                                <input type="radio" class="form-radio" name="reservation_type" {{ $index == 0 ? 'checked' : '' }} value="{{ $reservationType }}">
                                <span class="ml-1 text-gray-600">@lang('template.reservation_types.' . $reservationType)</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="mt-5">
                    <button type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700" onclick="window.addNewReservation()">
                        @lang('template.save')
                    </button>
                    <button type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none" onclick="window.toggleModal('reservation-modal')">
                        @lang('template.cancel')
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="reservation-modal-backdrop"></div>
