#include <stdio.h>

/* Logical defines. */
#define TRUE 1
#define FALSE 0

/* Page defines. */
#define PAGE_SIZE 100
#define MAX_FRAMES 5

/* Paging algorithm modes. */
#define FIFO 1
#define LRU 2
#define OPT 3

typedef struct {
	int pageNum;
	int usage;
	int lastUsed;
	int timeStamp;
} pageData;

int adds[100];
pageData frames[MAX_FRAMES];

int readAddressStream(char *filename);
void showAdds(int numAdds);
int pageReplace(int numAdds, char mode);
int searchFrameTable(int pageNum, int nFrames);
void showFrameTable(int nFrames);
int getIndexOfOldestPage(int nFrames);
int getIndexOfLRUPage(int nFrames);
int getIndexOfBeladyPage(int nFrames, int curAdd, int numAdds);
int numAdds;

int main()
{
	int pageFaults;

	/* Send message to user. */
	printf("hello tv land! \n");

	/* Read the incoming address stream from the input file. */
	numAdds = readAddressStream("address.txt");
	printf("numAdds = %d \n", numAdds);
	/* Show the addresses to the user. */
	showAdds(numAdds);

	/* Implement the FIFO page replacement algorithm. */
	printf("Page replacement (FIFO) \n");
	pageFaults = pageReplace(numAdds, FIFO);
	printf("pageFaults = %d \n", pageFaults);

	/* Implement the LRU page replacement algorithm. */
	printf("\n");
	printf("Page replacement (LRU) \n");
	pageFaults = pageReplace(numAdds, LRU);
	printf("pageFaults = %d \n", pageFaults);
	
	/* Implement Belady's page replacement algorithm. */
	printf("\n");
	printf("Page replacement (Belady's) \n");
	pageFaults = pageReplace(numAdds, OPT);
	printf("pageFaults = %d \n", pageFaults);

	return 0;
}


int readAddressStream(char *filename)
{
	FILE *in; 
	int address;
	int j;

	in = fopen(filename, "r");

	j=0;
	while(fscanf(in, "%d", &address) != EOF) {
		adds[j] = address;
		j=j+1;
	}
	fclose(in);

	return j;
}


void showAdds(int numAdds)
{
	int j;
	printf("Address Stream. \n");
	for(j=0;j<numAdds;j++) {
		printf("%d \n", adds[j]);
	}
}


int pageReplace(int numAdds, char mode)
{
	int j;
	int pageNum, offset;
	int frameNum, nFrames;
	int repFrame;
	int pageFaults;

	/* Initialize variables. */
	nFrames = 0;
	pageFaults = 0;

	/* For each address in the incoming address stream, manage the the page table. */
	for(j=0;j<numAdds;j++) {
		/* Calculate page and offset. */
		pageNum = adds[j] / PAGE_SIZE;
		offset = adds[j] % PAGE_SIZE;

		/* Search frame table to see if page is present in memory. */
		frameNum = searchFrameTable(pageNum, nFrames);

		/* If the page is not found in the page table, add it. */
		if (frameNum == -1) {
			/* If there is room in table add the frame. */
			if (nFrames < MAX_FRAMES) {
				frames[nFrames].pageNum = pageNum;
				frames[nFrames].usage = 0;
				frames[nFrames].lastUsed = j;
				frames[nFrames].timeStamp = j;
				nFrames++;
			}
			else {
				/* Pagefault. */
				switch (mode) {
				case FIFO:
					/* Find oldest frame. */
					repFrame = getIndexOfOldestPage(MAX_FRAMES);
					break;
				case LRU:
					/* Find the least recently used frame. */
					repFrame = getIndexOfLRUPage(MAX_FRAMES);
					break;
				case OPT:
			                /* Find the frame used furthest in the future. */
					repFrame = getIndexOfBeladyPage(MAX_FRAMES, j,numAdds);
					break;
				}
				/* Replace the frame. */
				frames[repFrame].pageNum = pageNum;				
				frames[repFrame].timeStamp = j; 
				frames[repFrame].lastUsed = j;
				/* Update the pagefault count. */
				pageFaults++;				
			}
		} /* End if page was not in frame table. */
		else {
			/* Frame was found in the table. */
		    /* Update the usage count and last time used. */
		   frames[frameNum].lastUsed = j;
		} /* End else. */

		/* Show the frame table to user. */
		showFrameTable(nFrames);
	} /* End for. */

	return pageFaults;
}



int searchFrameTable(int pageNum, int nFrames)
{
	int j;
	int frameIndex;
	char searching = 'T';

	for (j=0; j < nFrames; j++)
	{
		if ( frames[j].pageNum == pageNum)
		{
			frameIndex = j;
			searching = 'F';
		}
	}

	if (searching == 'T')
		frameIndex = -1;

	return frameIndex;
}

int getIndexOfOldestPage(int nFrames)
{
	int j;
	int old=0, oldIndex=0;

	for (j=1; j < nFrames; j++)
	{
		if(frames[j].timeStamp < frames[oldIndex].timeStamp)
			oldIndex = j;
	}
	
	return oldIndex;
}


int getIndexOfLRUPage(int nFrames)
{
	int j;
	int leastRU=0, lIndex=0;

	for (j=1;j < nFrames; j++)
	{
		if (frames[j].lastUsed < frames[lIndex].lastUsed)
			lIndex = j;
	}
	
	return lIndex;
}


int getIndexOfBeladyPage(int nFrames, int curAdd, int numAdds)
{
	int j;
	int opt, oIndex;
	oIndex = 0;

	for (j=0; j < nFrames; j++)
	{
		frames[j].usage = 0;
	}


	for (j = curAdd; j < numAdds; j++)
	{

		int pg = adds[j] / PAGE_SIZE;
	

		for (int i=0; i < nFrames; i++)
		{
			if ((frames[i].pageNum) == pg && (frames[i].usage == 0))
			{
				frames[i].usage = j;

			}
		}
	}


	for (int k=nFrames-1; k > -1; k--)
	{
		if (frames[k].usage == 0)
		{
			oIndex = k;
		}
		else if (frames[k].usage < frames[k].usage && frames[oIndex].usage != 0)
		{
			oIndex = k;
		}
	}


	return oIndex;
}

void showFrameTable(int nFrames)
{
	int j;

	printf("Frame Table - ");
	for (j=0;j<MAX_FRAMES;j++) {
		if (j<nFrames) {
			printf("%d  ", frames[j].pageNum);
		}
		else {
			printf("#  ");
		}
	}
	printf("\n");
}

		







