# Markdown to PDF

This is a very simple command-line program written in PHP that converts a Markdown to PDF.

## Installing

Clone the project and run Composer to install the dependencies:

    $ composer install

## Running

You can run the program using I/O redirection:

    $ ./md2pdf < file.md > file.pdf

Or using command-line options:

    $ ./md2pdf -i file.md -o file.pdf

### Command-line syntax

    md2pdf [-i path] [-o path] [input]

#### Options

* `i` - the input file path (Markdown).
* `o` - the output file path (PDF).
