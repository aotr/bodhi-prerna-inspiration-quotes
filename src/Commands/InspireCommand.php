<?php

namespace BodhiPrerna\InspirationQuotes\Commands;

use Illuminate\Console\Command;

class InspireCommand extends Command
{
    protected $signature = 'inspire-new';
    protected $description = 'Display an inspiring quote';

    public function handle()
    {
        // Load the quotes
        $authors = require __DIR__.'/../InspirationQuotes.php';
        
        // Select a random author
        $randomAuthorKey = array_rand($authors);

        $randomAuthor = $authors[$randomAuthorKey];
        
        // Check if 'quotes' key exists and is an array
        if (!isset($randomAuthor['quotes']) || !is_array($randomAuthor['quotes'])) {
            return $this->error('No quotes found for the selected author.');
        }
        
        // Select a random quote
        $randomQuoteKey = array_rand($randomAuthor['quotes']);
        $quote = $randomAuthor['quotes'][$randomQuoteKey];

        // Display the quote with the author's name
        $this->info("“{$quote}”\n  — {$randomAuthor['name']}");
    }
}
