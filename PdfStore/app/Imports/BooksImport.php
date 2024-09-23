<?php

namespace App\Imports;

use App\Models\Book;
use Exception;
use Illuminate\Support\Facades\Log;

class BooksImport
{
    public function import($filePath)
    {
        if (($handle = fopen($filePath, 'r')) !== false) {
            try {
                // Read and skip the header row
                $header = fgetcsv($handle, 1000, ',');

                // Ensure the header matches the expected format
                if ($header !== ['Book_Name', 'Description', 'Category']) {
                    Log::error('CSV headers do not match the expected format.');
                    return;
                }

                // Read each remaining row in the CSV
                while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                    // Skip any row with an empty 'Book_Name'
                    if (empty($row[0])) {
                        continue;
                    }

                    try {
                        // Insert or update the book in the database
                        Book::updateOrCreate(
                            ['Book_Name' => $row[0]],  // Book_Name as the unique key
                            [
                                'Description' => $row[1],  // Description
                                'Category'    => $row[2],  // Category
                            ]
                        );
                    } catch (Exception $e) {
                        Log::error('Error processing row: ' . json_encode($row) . ' - ' . $e->getMessage());
                    }
                }
            } finally {
                fclose($handle); // Ensure the file is always closed
            }
        } else {
            Log::error('Unable to open file: ' . $filePath);
        }
    }
}
