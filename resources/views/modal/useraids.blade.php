@if (count($finish) > 0 && $finish[$item->aidId])
@else
    <div class="modal fade" id="receiveFundsModal{{ $item->aidId }}" tabindex="-1" role="dialog"
        aria-labelledby="receiveFundsModalTitle{{ $item->aidId }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>
                        Attention
                    </h5>
                    <button type="button" class="btn btn-outline-dark close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <h5 style="text-align: justify;">Are You Sure You Want To Proceed To Receive The Funds?<br></h5>
                        <h6 style="text-align: justify;"> If
                            yes, please take note that once
                            you mark this aid request as receive funds, it will make this aid request done</h6>

                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"
                        onclick="receiveFund({{ $totalDonation }},{{ $id }},'{{ $item->paymentAddress }}')"
                        name="btnReceiveFund" value="yes">Yes,
                        Proceed</button>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="modal fade" id="viewDonationModal{{ $item->aidId }}" tabindex="-1" role="dialog"
    aria-labelledby="viewDonationModalTitle{{ $item->aidId }}" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewDonationModalTitle{{ $item->aidId }}">View Donation Details</h5>
                <button type="button" class="btn btn-outline-dark close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive mb-5">
                                        <table class="table border mb-2" id="sortTable">
                                            <thead class="table-light fw-semibold">
                                                <tr class="align-middle">
                                                    <th class="text-center">
                                                        Donator
                                                    </th>
                                                    <th>
                                                        Transaction Hash
                                                    </th>
                                                    <th class="text-center">
                                                        From
                                                    </th>
                                                    <th>Amount</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($donationDetail as $dd)
                                                    <tr class="align-middle">
                                                        <td class="text-center">
                                                            {{ $dd['firstName'] }} {{ $dd['middleName'] }}
                                                            {{ $dd['lastName'] }}
                                                        </td>
                                                        <td>
                                                            {{ $dd['hash'] }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $dd['from'] }}
                                                        </td>
                                                        <td>
                                                            P{{ number_format($dd['amount'], 2) }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {{-- <button class="btn btn-success" onclick="window.location.href='/user_aids/{{ $id }}'">View
                    All
                    Donation Details</button> --}}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
