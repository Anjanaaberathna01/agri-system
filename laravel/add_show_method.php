<?php

// Add show method to ToolsController
$file = 'app/Http/Controllers/ToolsController.php';
$content = file_get_contents($file);

$newMethod = "\tpublic function show(\$id)
\t{
\t\t\$tool = Tool::findOrFail(\$id);
\t\t\$relatedTools = Tool::where('id', '!=', \$id)->orderBy('title')->limit(4)->get();
\t\treturn view('tools.show', compact('tool', 'relatedTools'));
\t}

\t";

$searchPos = strpos($content, "\t// Admin Dashboard");
if ($searchPos !== false) {
    $newContent = substr_replace($content, $newMethod, $searchPos, 0);
    file_put_contents($file, $newContent);
    echo "Show method added successfully\n";
} else {
    echo "Could not find insertion point\n";
    echo "File length: " . strlen($content) . "\n";
}
?>
