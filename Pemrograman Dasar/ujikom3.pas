program ujiikom3;

uses crt;

var
        f : text;
        t : string;

begin
        clrscr;
        assign(f, 'TeksUjikom2.txt');
        reset(f);
        writeln('Isi file TeksUjikom2.txt = ');
        readln(f, t);
        writeln(t);
        close(f);
        readkey();
end.
