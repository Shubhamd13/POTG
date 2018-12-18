/*

Compile with the outfile named man.exe 
Depends on Windows PrintGDI API

Following are some structures and function from API that were used :

typedef struct _DOC_INFO_1 {
  LPTSTR pDocName;          Pointer to a null-terminated string that specifies the name of the document.
  LPTSTR pOutputFile;       Pointer to a null-terminated string that specifies the name of an output file. To print to a printer, set this to NULL
  LPTSTR pDatatype;         Pointer to a null-terminated string that identifies the type of data used to record the document.
} DOC_INFO_1;
*/
/*
BOOL OpenPrinter(
  _In_  LPTSTR             pPrinterName,
  _Out_ LPHANDLE           phPrinter,
  _In_  LPPRINTER_DEFAULTS pDefault
);
*/
/*
DWORD StartDocPrinter(
  _In_ HANDLE hPrinter,
  _In_ DWORD  Level,
  _In_ LPBYTE pDocInfo
);
BOOL StartPagePrinter(
  _In_ HANDLE hPrinter
);
*/
#include<iostream>
#include<windows.h>
#include<wincon.h>
#include<winspool.h>
using namespace std;
HANDLE print_handle ;
int main(int argc,char *argv[])
{
    DOC_INFO_1 doc;
    DOC_INFO_1 *docs=&doc;
    string p("\033EThis a test file");
    string s;
    long unsigned int written;
    doc.pDocName=(LPTSTR)"Somefile.txt";
    doc.pOutputFile=(LPTSTR)"";
    doc.pDatatype=(LPTSTR)"raw";
       //int r=OpenPrinter("HP LaserJet P1008",&print_handle,NULL);
       int r=OpenPrinter("HP LaserJet P1008",&print_handle,NULL);
       cout<<"rrrr"<<r<<endl;
       //OpenPrinter("Microsoft Print to PDF",&print_handle,NULL);
       StartDocPrinter(print_handle,1,reinterpret_cast<unsigned char *>(docs));
       StartPagePrinter(print_handle);
        if(argc==1)
        {
       WritePrinter(print_handle,(PVOID*)p.c_str(),p.length(),&written);
        }
       else
       {
           cout<<argc<<argv[1];
           for(int i=1;i<argc;i++)
           {
                    s+=argv[i];
                    s+=" ";
           }
           cout<<"this is string"<<s;
       WritePrinter(print_handle,(PVOID)s.c_str(),s.length(),&written);
       }
       EndPagePrinter(print_handle);
       EndDocPrinter(print_handle);
       ClosePrinter(print_handle);
        cout<<" ecode";
        cout<<GetLastError();
}

