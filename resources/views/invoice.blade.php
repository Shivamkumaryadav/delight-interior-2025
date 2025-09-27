<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Invoice</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-white text-black">
    <div class="container mx-auto p-4 sm:p-8">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <!-- Header -->
            <header class="flex flex-col sm:flex-row justify-between items-start sm:items-center pb-8 border-b border-gray-300">
                <div class="flex items-center space-x-4 mb-4 sm:mb-0">
                    <div class="bg-blue-600 p-3 rounded-full">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-blue-600">{{ $company['name'] ?? 'DELIGHT INTERIOR SERVICE' }}</h1>
                        <p class="text-sm">{{ $company['description'] ?? 'Specialist In: Garware Sun Control, All Type of Films, Pattern & Designs' }}</p>
                    </div>
                </div>
                <div class="text-sm text-right">
                    <p>{{ $company['address'] ?? '' }}</p>
                    <p>
                        <span class="font-semibold">Email:</span> {{ $company['email'] ?? '' }} |
                        <span class="font-semibold">Cell:</span> {{ $company['phone'] ?? '' }}
                    </p>
                </div>
            </header>

            <!-- Bill To / Invoice Info -->
            <div class="py-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div>
                    <h2 class="font-semibold text-blue-600 mb-2">BILL TO</h2>
                    {!! $client['html'] ?? '<p>Type client details here...</p>' !!}
                </div>
                <div>
                    <h2 class="font-semibold text-blue-600 mb-2">TAX INVOICE</h2>
                    <p><span class="font-medium">{{ $company['name'] ?? 'DELIGHT INTERIOR SERVICE' }}</span></p>
                    <p class="text-sm"><span class="font-semibold">GSTN:</span> {{ $company['gstn'] ?? '' }}</p>
                    <p class="text-sm"><span class="font-semibold">Invoice No:</span> {{ $invoice['number'] ?? '' }}</p>
                    <p class="text-sm"><span class="font-semibold">Date:</span> {{ $invoice['date'] ?? now()->format('d-m-Y') }}</p>
                </div>
            </div>

            <!-- Invoice Items Table -->
            <div class="overflow-x-auto border border-gray-300 rounded-lg mt-4">
                <table class="w-full text-sm text-left border-collapse">
                    <thead class="bg-gray-100 uppercase">
                        <tr>
                            <th class="px-4 py-2 border border-gray-300">Description</th>
                            <th class="px-4 py-2 border border-gray-300">HSN/SAC</th>
                            <th class="px-4 py-2 border border-gray-300 text-right">Quantity</th>
                            <th class="px-4 py-2 border border-gray-300 text-right">Rate</th>
                            <th class="px-4 py-2 border border-gray-300 text-right">Total</th>
                            <th class="px-4 py-2 border border-gray-300 text-center">CGST %</th>
                            <th class="px-4 py-2 border border-gray-300 text-right">CGST Amount</th>
                            <th class="px-4 py-2 border border-gray-300 text-center">SGST %</th>
                            <th class="px-4 py-2 border border-gray-300 text-right">SGST Amount</th>
                            <th class="px-4 py-2 border border-gray-300 text-right">IGST Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td class="px-4 py-2 border border-gray-300">{{ $item['description'] ?? '' }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $item['hsn'] ?? '' }}</td>
                            <td class="px-4 py-2 border border-gray-300 text-right">{{ number_format($item['quantity'] ?? 0, 2) }}</td>
                            <td class="px-4 py-2 border border-gray-300 text-right">{{ number_format($item['rate'] ?? 0, 2) }}</td>
                            <td class="px-4 py-2 border border-gray-300 text-right">{{ number_format($item['total'] ?? 0, 2) }}</td>
                            <td class="px-4 py-2 border border-gray-300 text-center">{{ $item['cgst_rate'] ?? 0 }}%</td>
                            <td class="px-4 py-2 border border-gray-300 text-right">{{ number_format($item['cgst_amount'] ?? 0, 2) }}</td>
                            <td class="px-4 py-2 border border-gray-300 text-center">{{ $item['sgst_rate'] ?? 0 }}%</td>
                            <td class="px-4 py-2 border border-gray-300 text-right">{{ number_format($item['sgst_amount'] ?? 0, 2) }}</td>
                            <td class="px-4 py-2 border border-gray-300 text-right">{{ number_format($item['igst_amount'] ?? 0, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Summary -->
            <div class="mt-4 flex justify-end">
                <div class="w-full sm:w-1/2 lg:w-1/3 space-y-2">
                    <div class="flex justify-between"><span>Subtotal</span> <span>{{ number_format($totals['subtotal'] ?? 0, 2) }}</span></div>
                    <div class="flex justify-between"><span>CGST ({{ $totals['cgst_rate'] ?? 0 }}%)</span> <span>{{ number_format($totals['cgst'] ?? 0, 2) }}</span></div>
                    <div class="flex justify-between"><span>SGST ({{ $totals['sgst_rate'] ?? 0 }}%)</span> <span>{{ number_format($totals['sgst'] ?? 0, 2) }}</span></div>
                    <div class="flex justify-between font-bold text-lg pt-2 border-t border-gray-300"><span>Grand Total</span> <span>{{ number_format($totals['grand_total'] ?? 0, 2) }}</span></div>
                    <div class="mt-2"><span>Amount in words:</span> {{ $totals['amount_in_words'] ?? '' }}</div>
                </div>
            </div>

            <!-- Payment Details -->
            <div class="mt-6 border-t border-gray-300 pt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-4 border border-gray-300 rounded-lg">
                    <h3 class="font-semibold text-blue-600 mb-2">Payment Details</h3>
                    <p><span class="font-medium">Payment Term:</span> {{ $payment['term'] ?? 'N/A' }}</p>
                    <p class="mt-1">Please transfer the total amount to below account:</p>
                    <p>Bank: {{ $bank['name'] ?? '' }}</p>
                    <p>Branch: {{ $bank['branch'] ?? '' }}</p>
                    <p>A/C No: {{ $bank['account_number'] ?? '' }}</p>
                    <p>IFSC: {{ $bank['ifsc'] ?? '' }}</p>
                </div>
                <div class="flex flex-col items-end justify-between p-4 border border-gray-300 rounded-lg">
                    <p class="font-semibold mb-2">For {{ $company['name'] ?? 'DELIGHT INTERIOR SERVICE' }}</p>
                    <img class="h-12" src="{{ $signature_url ?? 'https://via.placeholder.com/150x50.png?text=Signature' }}" alt="Authorized Sign">
                    <p class="mt-2 border-t border-gray-300 pt-2">Authorized Signatory</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
