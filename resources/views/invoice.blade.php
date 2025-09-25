<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Invoice</title>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body class="bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark">
    <div class="container mx-auto p-4 sm:p-8">
        <div class="bg-card-light dark:bg-card-dark p-8 rounded-lg shadow-lg">
            <header
                class="flex flex-col sm:flex-row justify-between items-start sm:items-center pb-8 border-b border-border-light dark:border-border-dark">
                <div class="flex items-center space-x-4 mb-4 sm:mb-0">
                    <div class="bg-primary p-3 rounded-full">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-primary">DELIGHT INTERIOR SERVICE</h1>
                        <p class="text-sm text-subtext-light dark:text-subtext-dark">Specialist In: Garware Sun Control,
                            All Type of Films, Pattern &amp;...</p>
                    </div>
                </div>
                <div class="text-sm text-right">
                    <p>11, Vaishali Sadan, Old Nagardas Rd., Mogra Pada, Andheri (E), Mumbai - 400 069</p>
                    <p><span class="font-semibold">Email:</span> delightinterior@gmail.com | <span
                            class="font-semibold">Cell:</span> 9821105937</p>
                </div>
            </header>
            <div class="py-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 bordered-section">
                <div class="space-y-2">
                    <h2 class="font-semibold text-primary mb-2">BILL TO</h2>
                    <p class="font-medium">M/s Ramdev Enterprises</p>
                    <p class="text-sm text-subtext-light dark:text-subtext-dark">Shop No - 102, 1st Floor Sayog CHS,
                        M.G. Rd., Near Ram Mandir Signal Goregoan West</p>
                    <p class="text-sm text-subtext-light dark:text-subtext-dark">Mumbai</p>
                    <p class="text-sm text-subtext-light dark:text-subtext-dark">GSTIN/UIN: 27AALHM1785MIZI</p>
                </div>
                <div class="space-y-2">
                    <h2 class="font-semibold text-primary mb-2">TAX INVOICE</h2>
                    <p><span class="font-medium">DELIGHT</span></p>
                    <p class="text-sm"><span class="font-semibold">INTERIOR SERVICE GSTN:</span> 27AESSP1449MIZZ</p>
                    <p class="text-sm"><span class="font-semibold">Invoice No:</span> 78</p>
                    <p class="text-sm"><span class="font-semibold">Date:</span> 21-09-2025</p>
                </div>
            </div>
            <div class="overflow-x-auto border border-border-light dark:border-border-dark rounded-lg">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-100 dark:bg-gray-800 uppercase">
                        <tr>
                            <th class="px-6 py-3 border-b border-r border-border-light dark:border-border-dark"
                                scope="col">Description of Materials</th>
                            <th class="px-6 py-3 border-b border-r border-border-light dark:border-border-dark"
                                scope="col">HSN/SAC Code</th>
                            <th class="px-6 py-3 text-right border-b border-r border-border-light dark:border-border-dark"
                                scope="col">Quantity Sqft</th>
                            <th class="px-6 py-3 text-right border-b border-r border-border-light dark:border-border-dark"
                                scope="col">Rate</th>
                            <th class="px-6 py-3 text-right border-b border-r border-border-light dark:border-border-dark"
                                scope="col">Total</th>
                            <th class="px-6 py-3 text-center border-b border-r border-border-light dark:border-border-dark"
                                colspan="2" scope="col">CGST</th>
                            <th class="px-6 py-3 text-center border-b border-r border-border-light dark:border-border-dark"
                                colspan="2" scope="col">SGST</th>
                            <th class="px-6 py-3 text-right border-b border-border-light dark:border-border-dark"
                                scope="col">IGST</th>
                        </tr>
                        <tr class="bg-gray-100 dark:bg-gray-800">
                            <th class="border-r border-border-light dark:border-border-dark"></th>
                            <th class="border-r border-border-light dark:border-border-dark"></th>
                            <th class="border-r border-border-light dark:border-border-dark"></th>
                            <th class="border-r border-border-light dark:border-border-dark"></th>
                            <th class="border-r border-border-light dark:border-border-dark"></th>
                            <th
                                class="px-3 py-2 text-center text-xs font-medium text-subtext-light dark:text-subtext-dark border-r border-border-light dark:border-border-dark">
                                Rate</th>
                            <th
                                class="px-3 py-2 text-center text-xs font-medium text-subtext-light dark:text-subtext-dark border-r border-border-light dark:border-border-dark">
                                Amount</th>
                            <th
                                class="px-3 py-2 text-center text-xs font-medium text-subtext-light dark:text-subtext-dark border-r border-border-light dark:border-border-dark">
                                Rate</th>
                            <th
                                class="px-3 py-2 text-center text-xs font-medium text-subtext-light dark:text-subtext-dark border-r border-border-light dark:border-border-dark">
                                Amount</th>
                            <th
                                class="px-3 py-2 text-right text-xs font-medium text-subtext-light dark:text-subtext-dark">
                                Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-border-light dark:border-border-dark">
                            <td class="px-6 py-4 font-medium border-r border-border-light dark:border-border-dark">
                                Garware Man White Film</td>
                            <td class="px-6 py-4 border-r border-border-light dark:border-border-dark">39206929</td>
                            <td class="px-6 py-4 text-right border-r border-border-light dark:border-border-dark">
                                9,613.00</td>
                            <td class="px-6 py-4 text-right border-r border-border-light dark:border-border-dark">13.50
                            </td>
                            <td class="px-6 py-4 text-right border-r border-border-light dark:border-border-dark">
                                1,29,775.00</td>
                            <td class="px-3 py-4 text-center border-r border-border-light dark:border-border-dark">9%
                            </td>
                            <td class="px-3 py-4 text-right border-r border-border-light dark:border-border-dark">
                                11,679.00</td>
                            <td class="px-3 py-4 text-center border-r border-border-light dark:border-border-dark">9%
                            </td>
                            <td class="px-3 py-4 text-right border-r border-border-light dark:border-border-dark">
                                11,679.00</td>
                            <td class="px-6 py-4 text-right">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-8 flex justify-end">
                <div class="w-full sm:w-1/2 lg:w-2/5 space-y-2">
                    <div class="flex justify-between text-sm cost-summary-item">
                        <span class="text-subtext-light dark:text-subtext-dark">Subtotal</span>
                        <span>1,29,775.00</span>
                    </div>
                    <div class="flex justify-between text-sm cost-summary-item">
                        <span class="text-subtext-light dark:text-subtext-dark">CGST (9%)</span>
                        <span>11,679.00</span>
                    </div>
                    <div class="flex justify-between text-sm cost-summary-item">
                        <span class="text-subtext-light dark:text-subtext-dark">SGST (9%)</span>
                        <span>11,679.00</span>
                    </div>
                    <div class="flex justify-between font-bold text-lg pt-4 mt-2 cost-summary-item">
                        <span>Grand Total</span>
                        <span>1,53,135.00</span>
                    </div>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-border-light dark:border-border-dark text-sm">
                <div class="mb-6 p-4 border border-border-light dark:border-border-dark rounded-lg">
                    <p><span class="font-semibold">Amount in words:</span> One lakh fifty-three thousand one hundred
                        thirty five only</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="p-4 border border-border-light dark:border-border-dark rounded-lg">
                        <h3 class="font-semibold text-primary mb-2">Payment Details</h3>
                        <p><span class="font-medium">Payment Term:</span> 100% advance.</p>
                        <p class="mt-1">Please transfer the total amount to the below account</p>
                        <div
                            class="mt-4 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-border-light dark:border-border-dark">
                            <p class="font-semibold">Bank Details for Payment of Bill</p>
                            <p>DELIGHT INTERIOR SERVICE</p>
                            <p>Bank: Union Bank of India</p>
                            <p>Branch: Andheri East Branch Mumbai - 400 069.</p>
                            <p>A/C NO: 315301010060059.</p>
                            <p>IFSC: UBIN0531533.</p>
                        </div>
                    </div>
                    <div
                        class="flex flex-col justify-between items-end p-4 border border-border-light dark:border-border-dark rounded-lg">
                        <div>
                            <p class="font-semibold mb-2">For DELIGHT INTERIOR SERVICE</p>
                            <img alt="Authorized Signature" class="h-12"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBexUyjoWRZTevDOT7EE31YgDHG4EHW__aQNDk44lEUwm64bQ3FKKAgw8IjAdlAD2MFR3fIR0BnBFEeKg7Xe8H99qGSzI-SITYEpDDjypTWwEbjspI1n2qGjLZhpFgA0vrk1k9COu3iCWYGwkAp_e_c7URp5SiAfdOovpRyS8HRX0U0z4-8aejPFHkrJq9FUxEsW8hCcClD-ApHyYp358wWC7XA14nkWEy9K41WC6TN3Mh-4sgUhQUbTxuzam2fxzBMcuxw5VpXynvR" />
                            <p class="mt-2 pt-2 border-t border-border-light dark:border-border-dark">Authorized
                                Signatory</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
