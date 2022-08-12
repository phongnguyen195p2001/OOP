<?php namespace App;

class fuzzy {

    /**
     * Perform a fuzzy string searching.
     *
     * @param array $rows
     * @param string $query
     * @param integer $threshold
     * @return array
     */
    public function search(array $rows,string $query,int $threshold = 3): array
    {
        $matched = [];
        foreach($rows as $key => $row)
        {
            $distance = $this->calculateDistance($row, $query);
            if ($threshold >= $distance)
            {
                $matched[$key] = [$distance, $row];
            }
        }
        return $this->transformResult($this->sortMatchedStrings($matched));
    }

    /**
     * Calculate the Levenshtein distance between two strings.
     *
     * @param string $one
     * @param string $two
     * @return int
     */
    protected function calculateDistance(string $one,string $two): int
    {
        return levenshtein($one, $two);
    }

    /**
     * Sort the matched strings.
     *
     * @param array $matched
     * @return array
     */
    protected function sortMatchedStrings(array $matched): array
    {
        usort($matched, function(array $left, array $right)
        {
            return ($left[0] - $right[0]);
        });

        return $matched;
    }

    /**
     * Transform a given array of matches.
     *
     * @param array $matched
     * @return array
     */
    protected function transformResult(array $matched): array
    {
        $iterator = function(array $element)
        {
            return $element[1];
        };
        return array_map($iterator, $matched);
    }
}